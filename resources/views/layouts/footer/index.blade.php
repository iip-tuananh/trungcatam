
<footer class="footer bg-white" style="--footer-overlay: #c12026">
   <div class="mid-footer">
       <div class="container">
           <div class="row">
               <div class="col-xs-12 col-md-6 col-xl-4 footer-click footer-1">
                   {{-- <h4 class="title-menu clicked">
                      {{$setting->company}}
                   </h4> --}}
                   <a href="{{route('home')}}" class="logo-wrapper mb-3 d-block tuan-ft-logo " >	
                   <img loading="lazy" 
                       class="lazyload" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" data-src="{{$setting->logo}}" 
                       alt="{{$setting->company}}"
                       style="width: 150px; height: auto;"
                       height="100%">
                   </a>
                   <div class="single-contact">
                       <i class="fa fa-map-marker-alt"></i>
                       <div class="content"><strong>Địa chỉ văn phòng: </strong>
                           <span>{{$setting->address1}}</span>
                       </div>
                   </div>
                   @if ( $setting->address2 != null)
                     
                   <div class="single-contact">
                       <i class="fa fa-map-marker-alt"></i>
                       <div class="content"><strong>Địa chỉ kho: </strong>
                           <span>{{{$setting->address2}}}</span>
                       </div>
                   </div>
                       
                
                       
                   @endif
               
                   <div class="single-contact">
                       <i class="fa fa-mobile-alt"></i>
                       <div class="content">
                           <strong>Số điện thoại: </strong>
                           <a class="link" title="{{$setting->phone1}}" href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a>
                       </div>
                   </div>
                   {{-- @if($setting->phone2 != null)
                   <div class="single-contact">
                    <i class="fa fa-mobile-alt"></i>
                    <div class="content">
                        <strong>Số điện thoại 2: </strong>
                        <a class="link" title="{{$setting->phone2}}" href="tel:{{$setting->phone2}}">{{$setting->phone2}}</a>
                    </div>
                </div>
                       
                   @endif --}}
                   <div class="single-contact">
                       <i class="fa fa-envelope"></i>
                       <div class="content">
                           <strong>Email: </strong><a title="{{$setting->email}}" class="link" href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                       </div>
                   </div>
                
               </div>
               <div class="col-xs-12 col-md-6 col-xl-2 footer-click">
                   <h4 class="title-menu clicked">
                       THÔNG TIN <i class="fa fa-angle-down d-md-none d-inline-block"></i>
                   </h4>
                   <ul class="list-menu toggle-mn" >
                    @foreach ($thongtin as $item)
                        <li class="li_menu">
                            <a class="link"  href="{{route('pagecontent',$item->slug)}}" title="Giới thiệu Công ty">{{$item->title}}</a>
                        </li>
                    @endforeach
                   </ul>
               </div>
               <div class="col-xs-12 col-md-6 col-xl-2 footer-click">
                   <h4 class="title-menu clicked">
                       HỖ TRỢ KHÁCH HÀNG <i class="fa fa-angle-down d-md-none d-inline-block"></i>
                   </h4>
                   <ul class="list-menu toggle-mn">
                    @foreach ($chinhsach as $item)
                        <li class="li_menu">
                            <a class="link" href="{{route('pagecontent',$item->slug)}}" title="Liên hệ">{{$item->title}}</a>
                        </li>
                        
                    @endforeach
                   
                   </ul>
               </div>
               <div class="col-xs-12 col-md-6 col-xl-4 footer-click">
                   <h4 class="title-menu clicked">
                       TỔNG ĐÀI HỖ TRỢ 
                   </h4>
                   <p>
                       <span>Hotline Tư Vấn: </span>
                       <a class='text-primary font-weight-bold' href='tel:{{$setting->phone1}}'>{{$setting->phone1}}</a>
                       <span> (07h30-21h30) </span>
                   </p>
                   {{-- <p>
                       <span>
                       Khiếu Nại Dịch Vụ: </span>
                       <a class='text-primary font-weight-bold' href='tel:{{$setting->phone2}}'>{{$setting->phone2}}</a>
                       <span> (07h30-21h30) </span>
                   </p> --}}
                   <div class="footer-fb mt-3">
                     {!!$setting->iframe_map  !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!---
       <div class="bg-footer-bottom copyright clearfix py-2">
          <div class="container">
             <div class="row">
                <div id="copyright" class=" col-xl-4 col-lg-12 col-md-12 col-xs-12 fot_copyright">
                   <span class="wsp">
                      © Bản quyền thuộc về 
                      <a href="https://egany.com" 
                          rel="nofollow" 
                          target="_blank">EGANY</a> | Cung cấp bởi <a href="https://www.haravan.com/?utm_campaign=poweredby&utm_medium=haravan&utm_source=onlinestore" rel="nofollow" title="Haravan" target="_blank">Haravan</a>
                   </span>
                </div>
             </div>
       
          </div>
       </div>
       -->
</footer>