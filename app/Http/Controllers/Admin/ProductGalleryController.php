<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\ProductGallery;
use App\Product;

use App\Http\Requests\Admin\ProductGalleryRequest;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Image;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = ProductGallery::with(['product']);

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <form action="' . route('product-gallery.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                ->editColumn('photos', function ($item) {
                    return $item->photos ? '<img src="' . Storage::url($item->photos) . '" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action','photos'])
                ->make();
        }

        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        
        return view('pages.admin.product-gallery.create',[
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        // ini syntax awal
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        ProductGallery::create($data);

        return redirect()->route('product-gallery.index');
        // akhir syntakx awal

        // $data = $request->all();

        // $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        // $img = Image::make($data);
        // resize the image so that the largest side fits within the limit; the smaller
        // side will be scaled to maintain the original aspect ratio
        // $img->resize(400, 400, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // });

        // insert watermark at bottom-right corner with 10px offset
        // $img->insert('public/images/watermark.png', 'bottom-right', 10, 10);

        // $img->save('assets/product', 'public');

        return redirect()->route('product-gallery.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findorFail($id);
        $item->delete();

        return redirect()->route('product-gallery.index');

    }
}
