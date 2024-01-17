<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classes;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // All Product
        $classes = classes::all();

        // Return Json Response
        return response()->json([
            'classes' => $classes
        ], 200);
    }

    public function store(Request $request)
    {
        try {

            // Create Product
            classes::create([
                'CLname' => $request->CLname,
                'lib' => $request->lib
            ]);

            // Return Json Response
            return response()->json([
                'message' => "class successfully created."
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ], 500);
        }
    }

    // public function show($id)
    // {
    //     // Product Detail 
    //     $product = Product::find($id);
    //     if (!$product) {
    //         return response()->json([
    //             'message' => 'Product Not Found.'
    //         ], 404);
    //     }

    //     // Return Json Response
    //     return response()->json([
    //         'product' => $product
    //     ], 200);
    // }

    // public function update(ProductStoreRequest $request, $id)
    // {
    //     try {
    //         // Find product
    //         $product = Product::find($id);
    //         if (!$product) {
    //             return response()->json([
    //                 'message' => 'Product Not Found.'
    //             ], 404);
    //         }

    //         //echo "request : $request->image";
    //         $product->name = $request->name;
    //         $product->description = $request->description;

    //         if ($request->image) {

    //             // Public storage
    //             $storage = Storage::disk('public');

    //             // Old iamge delete
    //             if ($storage->exists($product->image))
    //                 $storage->delete($product->image);

    //             // Image name
    //             $imageName = Str::random(32) . "." . $request->image->getClientOriginalExtension();
    //             $product->image = $imageName;

    //             // Image save in public folder
    //             $storage->put($imageName, file_get_contents($request->image));
    //         }

    //         // Update Product
    //         $product->save();

    //         // Return Json Response
    //         return response()->json([
    //             'message' => "Product successfully updated."
    //         ], 200);
    //     } catch (\Exception $e) {
    //         // Return Json Response
    //         return response()->json([
    //             'message' => "Something went really wrong!"
    //         ], 500);
    //     }
    // }

    // public function destroy($id)
    // {
    //     // Detail 
    //     $product = Product::find($id);
    //     if (!$product) {
    //         return response()->json([
    //             'message' => 'Product Not Found.'
    //         ], 404);
    //     }

    //     // Public storage
    //     $storage = Storage::disk('public');

    //     // Iamge delete
    //     if ($storage->exists($product->image))
    //         $storage->delete($product->image);

    //     // Delete Product
    //     $product->delete();

    //     // Return Json Response
    //     return response()->json([
    //         'message' => "Product successfully deleted."
    //     ], 200);
    // }
}
