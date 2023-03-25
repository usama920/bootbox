<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductDetailResource;
use App\Http\Resources\ProductResource;
use App\Models\{Gender,
    Material,
    Product,
    ProductImage,
    ProductSize,
    ProductOrder,
    ProductSubscription,
    Question, 
    SafetyResistance,
    Size,
    SocialLinks,
    Style,
    SubCategory,
    SubscriptionType,
    TierLevel,
    WeeklyMargin};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Product/AllProducts', [
            'products' => Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'styles_id', 'materials_id', 'tier_levels_id','safety_resistances_id')
                ->with('SubCategoryName', 'StyleName', 'MaterialName', 'TierName', 'SafetyName', 'ProductImages','ProductSizes', 'ProductSubscriptions')
                ->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function displayProducts()
    {
        $products = Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'genders_id')
            ->where('status' , 0)
            ->with('SubCategoryName', 'ProductImages', 'GenderName')
            ->orderBy('created_at', 'DESC')
            ->take(8)
            ->get();
        $content = SocialLinks::select('question_text')->first();
        $question = Question::select('id', 'question', 'answer')->get();
        return response()->json(['data1'=>ProductResource::collection($products), 'data2'=>$question,  'data3'=>$content]);
    }

    public function displayAllProduct()
    {
        $products = Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'genders_id')
            ->where('status' , 0)
            ->with('SubCategoryName', 'ProductImages', 'GenderName')
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json(ProductResource::collection($products));
    }

    public function displayMenProduct()
    {
        $products = Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'genders_id')
            ->where(array('status'=> 0, 'genders_id'=>1))
            ->with('SubCategoryName', 'ProductImages', 'GenderName')
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json(ProductResource::collection($products));
    }

    public function displayWomenProduct()
    {
        $products = Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'genders_id')
            ->where(array('status'=> 0, 'genders_id'=>2))
            ->with('SubCategoryName', 'ProductImages', 'GenderName')
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json(ProductResource::collection($products));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = json_decode($request->id, true);
        $gender = json_decode($request->gender, true);
        $style = json_decode($request->style, true);
        $size = json_decode($request->size, true);
        $subscription = json_decode($request->subscription, true);
        $subCategory = json_decode($request->subCategory, true);
        $tier = json_decode($request->tier, true);
        $safety = json_decode($request->safety, true);
        $material = json_decode($request->material, true);
        $name = json_decode($request->name, true);
        $description = json_decode($request->description, true);
        $price = json_decode($request->price, true);
        $status = json_decode($request->status, true);
        $weekly_strip_id = json_decode($request->weekly_strip_id, true);
        $previous_img = json_decode($request->previous_img, true);
        $length = json_decode($request->length, true);
//        dd($weekly_strip_id);

        $product = Product::updateOrCreate([
            'id'=>$id ?? ''
        ],[
            'product_name'=>$name ?? '',
            'description'=>$description ?? '',
            'product_slug'=>Str::slug($name) ?? '',
            'product_price'=>$price ?? '',
            'sub_categories_id'=>$subCategory ?? '',
            'styles_id'=>$style ?? '',
            'materials_id'=>$material ?? '',
            'tier_levels_id'=>$tier ?? '',
            'safety_resistances_id'=>$safety ?? '',
            'genders_id'=>$gender ?? '',
            'status'=>$status ?? '',
        ]);

        if (!empty($size) && count($size)>0){
            foreach ($size as $key => $status ) {
                if (!empty($status) && $status === true)
                    $check = 1;
                else
                    $check = 0;
                ProductSize::updateOrCreate([
                    'products_id' => $product->id,
                    'sizes_id' => $key,
                    'status' => $check,
                ]);
            }
        }


        // $this->prx($subscription);


        if (!empty($subscription) && !empty($subscription['check']) && count($subscription['check'])>0){
            ProductSubscription::where(['products_id' => $product->id])->delete();
            foreach ($subscription['check'] as $key => $status ) {
                if (!empty($status) && $status === true && !empty($subscription['price'][$key]) && !empty($subscription['stripe_id'][$key])){
                    $check = 1;
                    $price = $subscription['price'][$key];
                    $strip = $subscription['stripe_id'][$key];
                    // ProductSubscription::Create([
                    //     'products_id' => $product->id,
                    //     'subscription_types_id' => $key,
                    //     'strip_price_id' => $strip,
                    //     'price' => $price,
                    //     'weekly_strip_id' => $weekly_strip_id,
                    //     'status' => $check,
                    // ]);
                    
                    ProductSubscription::updateOrCreate([
                        'products_id' => $product->id,
                        'subscription_types_id' => $key,
                        ],[
                        'strip_price_id'=>$strip,
                        'price' => $price,
                        'weekly_strip_id' => $weekly_strip_id,
                        'status' => $check,
                    ]);
                }
            }
        }

        for ($i=1; $i <= $length; $i++ ){
            if ($request->hasFile('image'.$i)) {
                $file1 = $request->file('image'.$i)->getClientOriginalName();
                $filename1 = pathinfo($file1, PATHINFO_FILENAME);
                $extension1 = pathinfo($file1, PATHINFO_EXTENSION);
                $image = $filename1.'-'.time().'.'.$extension1;
                $request->file('image'.$i)->move(public_path('storage/images/products'), $image);
                if (empty($image))
                    $image='';
                ProductImage::create([
                    'products_id' => $product->id,
                    'name'=>$image,
                    'system_name' => $filename1,
                ]);

                if (!empty($length) && $length !== 0 && !empty($previous_img) && count($previous_img) !== 0){
                    foreach ($previous_img as $item) {
                        if(!empty($item)){
                            if (File::exists(storage_path('/app/public/images/products/') . $item['name'])) {
                                File::delete(storage_path('/app/public/images/products/') . $item['name']);
                            }
                            ProductImage::where('id', $item['id'])->delete();
                        }
                    }
                }
            }
        }
        return response()->success($product);
    }

    public function prx($value)
    {
        echo "<pre>";
        print_r($value);
        die;
    }

    /**
     * Display the specified resource.
     */
    public function show($slug='')
    {
        if(empty($slug))
            return Inertia::render('Admin/Product/AddProduct');
        else
            return Inertia::render('Admin/Product/AddProduct', [
                'product_info' => Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'styles_id', 'genders_id', 'materials_id', 'tier_levels_id','safety_resistances_id')
                    ->where('product_slug', $slug)
                    ->with('ProductImages', 'ProductSizes', 'ProductSubscriptions')
                    ->first()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($slug)
    {
        $intent = null;
        if(Auth::check()) {
            $intent = Auth::user()->createSetupIntent();
        }
        $detail = new ProductDetailResource(Product::select('id', 'product_name', 'description', 'product_slug', 'product_price', 'status', 'sub_categories_id', 'genders_id', 'styles_id', 'materials_id', 'tier_levels_id','safety_resistances_id')
            ->where('product_slug', $slug)
            ->with('SubCategoryName', 'StyleName', 'MaterialName', 'TierName', 'SafetyName', 'ProductImages', 'ProductSizes', 'GenderName', 'SubscribeOptions')
            ->first());
    //    dd($detail);
        return Inertia::render('User/ProductDetail', [
            'product_detail' => $detail,
            'weekly_margin'=>WeeklyMargin::select('margin_amount')->first(),
            'intent' => $intent
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return response()->success();
    }

    public function options ()
    {
        $style = Style::all();
        $size = Size::all();
        $subCategory = SubCategory::all();
        $tier = TierLevel::all();
        $safety = SafetyResistance::all();
        $material = Material::all();
        $subscription = SubscriptionType::all();
        $genders = Gender::all();

        return response()->json([
            'data1'=> $style,
            'data2'=> $size,
            'data3'=> $material,
            'data4'=> $subCategory,
            'data5'=> $tier,
            'data6'=> $safety,
            'data7'=> $subscription,
            'data8'=> $genders,
        ]);
    }

    public function order (Request $request)
    {
        // dd($request->all());

        $request->validate([
            "size" => 'required',
            "subscription" => 'required',
            "slug" => 'required',
            "type" => 'required',
            "country" => 'required',
            "zipcode" => 'required',
            "state" => 'required',
            "city" => 'required',
            "address_1" => 'required',
            "phone" => 'required',
            "name" => 'required',
            "stripe_price_weekly_id" => 'required',
            "stripe_price_monthly_id" => 'required',
        ]);
        $product = Product::select('id')->where('product_slug', $request->slug)->first();
        if(!empty($product)){
            if($request->type === 1)
                $stripe_id = $request->stripe_price_weekly_id;
            else
                $stripe_id = $request->stripe_price_monthly_id;
        
            $existingOrders = ProductOrder::where(['user_id' => Auth::user()->id, 'status' => 0])->get();
            if(count($existingOrders) > 0) {
                ProductOrder::where(['user_id' => Auth::user()->id, 'status' => 0])->delete();
            }
            ProductOrder::create([
                'user_id' => auth()->user()->id,
                'products_id'=>$product->id,
                'subscription_types_id'=>$request->subscription,
                'product_sizes_id'=>$request->size,
                'status'=>0,
                'subscription_type'=>$request->type,
                'strip_price_id'=>$stripe_id,
                'total_amount'=>$request->total_amount,
                'installment_price'=>$request->installment_amount,
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address_1'=>$request->address_1,
                'address_2'=>$request->address_2,
                'city'=>$request->city,
                'state'=>$request->state,
                'zipcode'=>$request->zipcode,
                'country'=>$request->country
            ]);
            return response()->success($stripe_id);
        }
    }

    public function Checkout(Request $request, $stripe_price_id)
    {
        return $request->user()
            ->newSubscription('default', $stripe_price_id)
            ->checkout([
            'success_url' => url('/'),
            'cancel_url' => url('/show-products/all')
        ]);
    }

    public function StripeSetup()
    {
        $subscribe = $intent = '';
        if(auth()->check()) {
            $subscribe = auth()->user()->subscribed('default');
            if ($subscribe === false) {
                $intent = auth()->user()->createSetupIntent();
            }
        }
        return response()->success(['intent' => $intent, 'subscribe' => $subscribe]);
    }
}
