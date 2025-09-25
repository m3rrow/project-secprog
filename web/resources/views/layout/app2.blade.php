<x-header2 />
    <!-- banner section start start-->
    <div class="index1-listing-slider-wrapper float_left">
       <div class="container">
          <div class="slider-text text-center">
             <h4>@yield("content_title")</h4>
             <ul>
                <li>
                   <a href="javascript:;">Home</a>
                </li>
                <li>/ @yield("content_desc")</li>
             </ul>
          </div>
       </div>
    </div>

    @yield('content')
    <!-- Five accordion end -->
<x-footer />