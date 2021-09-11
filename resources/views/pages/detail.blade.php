@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection

@section('content')
<!-- Page Content -->
  <div class="page-content page-details">
    <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Product Details
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="store-gallery" id="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
              <img
                :key="photos[activePhoto].id"
                :src="photos[activePhoto].url"
                class="w-100 main-image"
                alt=""
              />
            </transition>
          </div>
          <div class="col-lg-2">
            <div class="row">
              <div
                class="col-3 col-lg-12 mt-2 mt-lg-0"
                v-for="(photo, index) in photos"
                :key="photo.id"
                data-aos="zoom-in"
                data-aos-delay="100"
              >
                <a href="#" @click="changeActive(index)">
                  <img
                    :src="photo.url"
                    class="w-100 thumbnail-image"
                    :class="{ active: index == activePhoto }"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="store-details-container" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1>Mangga</h1>
              <div class="owner">By Buah buaha</div>
              <div class="price">$1,409</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              <a
                class="btn btn-success nav-link px-4 text-white btn-block mb-3"
                href="/cart.html"
                >Add to Cart</a
              >
            </div>
          </div>
        </div>
      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sequi, voluptate sed dolorem voluptatibus autem. Rem ipsa at, quod aliquam nesciunt commodi unde quo necessitatibus magnam laudantium labore. Autem, at.
              </p>
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum velit similique, est ipsam ea, fugit aliquam, magni modi assumenda libero hic eos! Molestias harum mollitia a vero, expedita dolore, accusamus modi exercitationem nesciunt recusandae non fugit architecto. Quasi, eligendi repudiandae.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="store-review">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mt-3 mb-3">
              <h5>Customer Review (3)</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8">
              <ul class="list-unstyled">
                <li class="media">
                  <img
                    src="/images/icon-testimonial-1.png"
                    class="mr-3 rounded-circle"
                    alt=""
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">User 3</h5>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore tenetur nam quas dicta suscipit magni eaque adipisci tempora repellat officiis qui ea, quo eum accusamus optio vitae ratione atque id?
                  </div>
                </li>
                <li class="media my-4">
                  <img
                    src="/images/icon-testimonial-2.png"
                    class="mr-3 rounded-circle"
                    alt=""
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">User 2</h5>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat porro corporis esse quod, exercitationem libero quo quae aut dolorum. Nostrum illum asperiores reiciendis pariatur distinctio. Voluptates temporibus distinctio atque quos.
                  </div>
                </li>
                <li class="media">
                  <img
                    src="/images/icon-testimonial-3.png"
                    class="mr-3 rounded-circle"
                    alt=""
                  />
                  <div class="media-body">
                    <h5 class="mt-2 mb-1">User 1</h5>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa eius repellendus fugit repudiandae cum inventore.
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
    
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
  var gallery = new Vue({
    el: "#gallery",
    mounted() {
      AOS.init();
    },
    data: {
      activePhoto: 3,
      photos: [
        {
          id: 1,
          url: "/images/product-detailss-1.jpg",
        },
        {
          id: 2,
          url: "/images/product-detailss-2.jpg",
        },
        {
          id: 3,
          url: "/images/product-detailss-3.jpg",
        },
        {
          id: 4,
          url: "/images/product-detailss-4.jpg",
        },
      ],
    },
    methods: {
      changeActive(id) {
        this.activePhoto = id;
      },
    },
  });
</script>
    
@endpush