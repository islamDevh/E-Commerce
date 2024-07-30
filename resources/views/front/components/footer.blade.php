      <!-- footer start -->
      <footer id="footer">
         <div class="wrap-footer-content footer-style-1">
            <div class="main-footer-content">
               <div class="container">
                  <div class="row">
   
                     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                           <h3 class="item-header">Contact Details</h3>
                           <div class="item-content">
                              <div class="wrap-contact-detail">
                                 <ul>
                                    <li>
                                       <i class="fa fa-phone" aria-hidden="true"></i>
                                       @foreach ($settings as $setting)
                                       <p class="contact-txt">{{ $setting->phone }}</p>
                                       @endforeach
                                    </li>
                                    <li>
                                       <i class="fa fa-envelope" aria-hidden="true"></i>
                                       @foreach ($settings as $setting)
                                       <p class="contact-txt">{{ $setting->email }}</p>
                                       @endforeach

                                    </li>											
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                        <div class="row">
                           <div class="wrap-footer-item twin-item">
                              <h3 class="item-header">Pages</h3>
                              <div class="item-content">
                                 <div class="wrap-vertical-nav">
                                    <ul>
                                    @foreach ($pages as $page)
                                       <li class="menu-item"><a href="{{ route('page.show-front', $page->id) }}">{{ $page->title }}</a></li>
                                    @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                           <h3 class="item-header">Social network</h3>
                           <div class="item-content">
                              <div class="wrap-list-item social-network">
                                 <ul>
                                    @foreach ($settings as $setting)
                                    <li><a href="{{ $setting->twitter }}" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $setting->facebook }}" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $setting->instagram }}" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $setting->youtube }}" class="link-to-item" title="instagram"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                    @endforeach
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
   
                  <div class="row">
                     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="wrap-footer-item">
                           <h3 class="item-header">We Using Safe Payments:</h3>
                           <div class="item-content">
                              <div class="wrap-list-item wrap-gallery">
                                 <img src="{{URL::asset('front/assets')}}/images/payment.png" style="max-width: 260px;">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
   
               <div class="wrap-back-link">
                  <div class="container">
                     <div class="back-link-box">
                        <h3 class="backlink-title">Quick Links</h3>
                        <div class="back-link-row">
                           <ul class="list-back-link" >
                              <li><span class="row-title">Mobiles:</span></li>
                              <li><a href="#" class="redirect-back-link" title="mobile">Mobiles</a></li>
                              <li><a href="#" class="redirect-back-link" title="yphones">YPhones</a></li>
                              <li><a href="#" class="redirect-back-link" title="Gianee Mobiles GL">Gianee Mobiles GL</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Karbonn">Mobiles Karbonn</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Viva">Mobiles Viva</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Intex">Mobiles Intex</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Micrumex">Mobiles Micrumex</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Bsus">Mobiles Bsus</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Samsyng">Mobiles Samsyng</a></li>
                              <li><a href="#" class="redirect-back-link" title="Mobiles Lenova">Mobiles Lenova</a></li>
                           </ul>
   
                           <ul class="list-back-link" >
                              <li><span class="row-title">Tablets:</span></li>
                              <li><a href="#" class="redirect-back-link" title="Plesc YPads">Plesc YPads</a></li>
                              <li><a href="#" class="redirect-back-link" title="Samsyng Tablets" >Samsyng Tablets</a></li>
                              <li><a href="#" class="redirect-back-link" title="Qindows Tablets" >Qindows Tablets</a></li>
                              <li><a href="#" class="redirect-back-link" title="Calling Tablets" >Calling Tablets</a></li>
                              <li><a href="#" class="redirect-back-link" title="Micrumex Tablets" >Micrumex Tablets</a></li>
                              <li><a href="#" class="redirect-back-link" title="Lenova Tablets Bsus" >Lenova Tablets Bsus</a></li>
                              <li><a href="#" class="redirect-back-link" title="Tablets iBall" >Tablets iBall</a></li>
                              <li><a href="#" class="redirect-back-link" title="Tablets Swipe" >Tablets Swipe</a></li>
                              <li><a href="#" class="redirect-back-link" title="Tablets TVs, Audio" >Tablets TVs, Audio</a></li>
                           </ul>
   
                           <ul class="list-back-link" >
                              <li><span class="row-title">Fashion:</span></li>
                              <li><a href="#" class="redirect-back-link" title="Sarees Silk" >Sarees Silk</a></li>
                              <li><a href="#" class="redirect-back-link" title="sarees Salwar" >sarees Salwar</a></li>
                              <li><a href="#" class="redirect-back-link" title="Suits Lehengas" >Suits Lehengas</a></li>
                              <li><a href="#" class="redirect-back-link" title="Biba Jewellery" >Biba Jewellery</a></li>
                              <li><a href="#" class="redirect-back-link" title="Rings Earrings" >Rings Earrings</a></li>
                              <li><a href="#" class="redirect-back-link" title="Diamond Rings" >Diamond Rings</a></li>
                              <li><a href="#" class="redirect-back-link" title="Loose Diamond Shoes" >Loose Diamond Shoes</a></li>
                              <li><a href="#" class="redirect-back-link" title="BootsMen Watches" >BootsMen Watches</a></li>
                              <li><a href="#" class="redirect-back-link" title="Women Watches" >Women Watches</a></li>
                           </ul>
   
                        </div>
                     </div>
                  </div>
               </div>
   
            </div>
   
            <div class="coppy-right-box">
               <div class="container">
                  <div class="coppy-right-item item-left">
                     <p class="coppy-right-text">Copyright © 2020 Surfside Media. All rights reserved</p>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
      </footer>
     <!-- footer end -->
