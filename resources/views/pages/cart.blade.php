@extends('layouts.app')

@section('title')
    Cart - Sekolah Vokasi E-COM
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

      <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
            <div class="container">
                  <!--Error-->
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <!--end Error-->
                <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                         <table>
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Total</th>
                                    <th>Jumlah</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @php $totalPrice = 0 @endphp 
                                @php $totalWeight = 0 @endphp
                                @foreach ($carts as $cart)
                                @php $totalWeight += $cart->product->weight * $cart->quantity @endphp

                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic"  style="width:30%">  
                                            @if ($cart->product->galleries) <!--kalo da gambar maka gambar akan muncul dgn ngambil dari storage, variabel cart ke objek produk ke objek galleri berdasarkan foto pertama -->
                                                <img src="{{ Storage::url($cart->product->galleries->first()->photos ?? '') }}"
                                                     alt="" />
                                            @endif
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $cart->product->name }}</h6>
                                            <h6> {{ number_format($cart->product->weight)}}gr</h6>
                                            <h5>Rp. {{ number_format($cart->product->price)}}</h5>
                                        </div>
                                    </td>
                                    <td class="cart__price">Rp. {{ number_format($cart->product->price*$cart->quantity)}}</td>
                                    
                                    {{-- <form action="{{ route('cart-update-quantity', $cart->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <td style="width: 15%">
                                                <div class="product-title">
                                                    <div class="input-group">
                                                        <input class="form-control" type="number" name="quantity"
                                                            id="quantity" value="{{ $cart->quantity }}">
                                                        <div class="input-group-append">
                                                            <label for="quantity" class="input-group-text">Pcs</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="width: 50%">
                                                <button type="submit" class="btn btn-success"> Update</button>
                                        </form> --}}


                                    <form action="{{ route('cart-update-quantity', $cart->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                 <div class="input-group-append">
                                                    <input class="form-control" type="number" name="quantity"
                                                                    id="quantity" value="{{ $cart->quantity }}">
                                                        <div class="input-group-append">
                                                                    <label for="quantity" class="input-group-text">Pcs</label>
                                                        </div>
                                                 </div>
                                            </div>
                                        </div>
                                        <td class="cart__close">
                                                <button type="submit" class="cart-btn fa fa-repeat"></button>
                                    </form>
                                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                             <button type="submit" class=" cart-btn fa fa-close"></button>
                                        </form>
                                        </td>
                                    </tr>
                                    @php $totalPrice += $cart->product->price * $cart->quantity @endphp <!--buat ngitung total harga produk(harga*quantity)-->
                               @endforeach
                            </tbody>
                        </table>            
                    </div>
                </div>
                    <div class="col-lg-4">
                        <div class="cart__total">
                            <h4 style="font-weight: bold">Cart total</h4>
                            <ul>
                                <li>Subtotal <span id="totalproduct_text">Rp.{{ number_format($totalPrice ?? 0) }}</span></li>
                                <li>Ongkos Kirim <span id="ongkir-text">Rp.0</span></li>
                                <li>Total <span id="total-text">Rp.
                                {{ number_format($totalPrice ?? 0) }}</span></li>
                            </ul>
                            
                        </div>
                </div>
                </div>
                <!--Shipping-->
                <div class="row">
                    <div class="col-8">
                        <hr/>
                    </div>
                </div>
                <div class="col-8">
                <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
                    @csrf
                    
                    <input type="hidden" name="total_price" id="total_price" value=" {{ $totalPrice }}">
                    <input type="hidden" name="shipping_price" id="shipping_price" value="">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Alamat Detail</label>
                                <input type="text" class="form-control" name="address_one" id="address_one"
                                    />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_two">Detail Patokan</label>
                                <input type="text" class="form-control" name="address_two" id="address_two"
                                     />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinces_id">Provinsi </label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces"
                                    v-model="provinces_id"> <!-- v-if="provinces" klo data provinsi ada baru dimunculin, klo gada ya ga.
                                        v-model:provinces_id datanya bisa dibaca divuejs-->
                                    <option v-for="province in provinces" :value="province.id"> @{{ province.name }} <!--klo mau output vue tu pke et soalnya biar ga kebaca sebagai output blade karena vue js dan blad utput variable hampir sama  -->
                                    </option>
                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="regencies_id">Kota </label>
                                <select name="regencies_id" onchange="cekOngkir()" id="regencies_id" class="form-control"
                                    v-if="regencies" v-model="regencies_id">
                                    <option v-for="regency in regencies" :value="regency.id"> @{{ regency.name }}
                                    </option>
                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="courier">Pilihan Kurir</label>
                                <select name="couriers_id" id="couriers_id" class="form-control">
                                </select>
                                <input type="hidden" name="courier_name" id="courier_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zip_code">Kode POS</label>
                                <input type="text" class="form-control" name="zip_code" id="zip_code" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Negara</label>
                                <input type="text" class="form-control" name="country" id="country"
                                    value="Indonesia" disabled />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone_number">Nomor Telpon</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number" />
                            </div>
                        </div>
                        <button type="submit" id="btn_submit" class="primary-btn col-lg-12 col-md-12" disabled >Checkout</button>
                    </div>


                </form>
                </div>
                
            </div>
        </section>
    
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var locations = new Vue({ //inisialisasi dalam satu variable bernama location didalamnya menginisialisasikan vue baru
            el: "#locations", // element location ini buat id:locations di atas dibagian form
            mounted() {
                AOS.init();
                this.getProvincesData(); //panggil methods dibawah saat hal ditampilkan dan vue js terpanggil
            },
            data: { //data kosongan, untuk menympan data provinsi dan data kabupaten xisimpen berdasarkan idnya itu sendiri
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
                couriers: null,
                couriers_id: null,
            },
            methods: { //untuk nampilin data perlu axios
                getProvincesData() {
                    var self = this; //biar bisa baca variable ini diaxios
                    axios.get('{{ route('api-provinces') }}') //panggil route
                        .then(function(response) { //panggil
                            //data respon dari api itu sendiri
                            self.provinces = response.data;
                        })
                },
               

                getRegenciesData() { //dipanggil berdasarkan perubahan pd provinsi
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)//ngambil provinces_id pada methods getprovincesdata diatas
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
            },
            watch: {  //digunaan buat ngeliat data klo ada perubahan klo variable provinces_id berubah maka memanggil getregenciesdata baru
                //caranya panggil provinces_id kemudaian bikin function(val,old val) mksudnya klo butuh value lama, nah value barunya ada disini
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null; //ini fungsinya kalo gnti provinsi data kabupatennya null atau ke reset
                    this.getRegenciesData(); //ambil data
                }
            }

        });

        function cekOngkir() {
            var regencies_id = $('#regencies_id').val(); // id kota pembeli

            // mengirimkan data ke route
            $.ajax({
                url: "/ongkir/" + regencies_id,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    $('#couriers_id').append('<option>Pilih Kurir</option>');
                    $.each(res, function (i, value) {
                        $('#couriers_id').append('<option data-name="' + i +'" value=' + value + '>' + i + ' - Rp. ' + value + '</option>');
                    });
                }
            });
        }

        $('#couriers_id').change(function() {
            var ongkir = $(this).val();
            var total_product = {{ $totalPrice }}; // total harga produk
            var total = parseInt(ongkir) + parseInt(total_product); // total harga produk + ongkir

            $('#courier_name').val($(this).find(':selected').data('name'));
            $('#totalproduct_text').text('Rp. ' + total_product); //menampilkan harga total produk
            $('#ongkir-text').text('Rp. ' + ongkir); // menampilkan harga ongkir
            $('#total-text').text('Rp. ' + total); // menampilkan total harga
            $('#total_price').val(total); // merubah value form total harga
            $('#shipping_price').val(ongkir); // merubah value form ongkir
            $('#btn_submit').prop('disabled', false); // mengaktifkan tombol submit
        });
    </script>
@endpush
