@extends('layouts.main.master')

@section('css')
<link href="{{env('AWS_R2_URL')}}/frontend/css/account_order_style.scss.css" rel="stylesheet" type="text/css" />
<link href="{{env('AWS_R2_URL')}}/frontend/css/evo-accounts.scss.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="bread-crumb">
   <div class="container">
      <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
         <li class="home" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="{{route('home')}}" title="Trang chủ">
               <span itemprop="name">Trang chủ</span>
               <meta itemprop="position" content="1">
            </a>
         </li>>
         <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="" title="Trang Tài khoản">
               <span itemprop="name">Trang Tài khoản</span>
               <meta itemprop="position" content="2">
            </a>
         </li>
         <li class="active" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <strong itemprop="name">Trang đơn hàng</strong>
            <meta itemprop="position" content="3">
         </li>
      </ul>
   </div>
</section>
<section class="signup page_customer_account">
   <div class="container">
      <div class="shadow-sm">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
               <div class="block-account">
                  <h5 class="title-account">Trang tài khoản</h5>
                  <p>
                     Xin chào, <span style="color:;">a</span>&nbsp;!
                  </p>
                  <ul>
                     <li>
                        <a class="title-info active" href="{{route('accoungOrder')}}" title="Đơn hàng của bạn">Đơn hàng của bạn</a>
                     </li>
                     <li>
                        <a class="title-info" href="{{route('logout')}}" title="Sổ địa chỉ">Đăng xuất</a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-9 col-right-ac">
               <h1 class="title-head margin-top-0">Đơn hàng của bạn</h1>
               <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                  <div class="my-account">
                     <div class="dashboard">
                        <div class="recent-orders">
                           <div class="table-responsive tab-all">
                              <table class="table table-cart table-order" id="my-orders-table">
                                 <thead class="thead-default">
                                    <tr>
                                       <th>Đơn hàng</th>
                                       <th>Ngày</th>
                                       <th>Địa chỉ</th>
                                       <th>Giá trị đơn hàng</th>
                                       <th>TT thanh toán</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($bill as $item)
                                    {{-- @php
                                        dd($item);
                                    @endphp --}}
                                    <tr class="first odd">
                                      <td><a href="{{route('accoungOrderDetail',['billid'=>$item->code_bill])}}">#{{$item->code_bill}}</a></td>
                                      <td>{{date_format($item->created_at,'d/m/Y')}}</td>
                                      <td>
                                          {{$item->cus_address}}
                                      </td>
                                      <td>
                                         <span class="price">{{number_format($item->total_money)}}₫</span>
                                      </td>
                                      <td>
                                          @if ($item->statu == 0)
                                          <span class="span_pending">Đang xác nhận thanh toán</span>
                                          @elseif($item->statu == 1)
                                          <span class="span_pending">Đã thanh toán</span>
                                          @elseif($item->statu == 2)
                                          <span class="span_pending">Đang vận chuyển</span>
                                          @elseif($item->statu == 3)
                                          <span class="span_pending">Hoàn thành đơn hàng</span>
                                          @elseif($item->statu == 4)
                                          <span class="span_pending">Đơn hàng thất bại</span>
                                          @endif
                                         
                                      </td>
                                   </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           <div class="paginate-pages pull-right page-account text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<style>
   /* Account Orders Page Styling */
.bread-crumb {
  background-color: #f8f9fa;
  padding: 15px 0;
  margin-bottom: 30px;
  border-bottom: 1px solid #eee;
}

.breadcrumb {
  background: transparent;
  margin-bottom: 0;
  padding: 0;
  
  li {
    display: inline-block;
    font-size: 14px;
    
    &:not(:last-child):after {
      content: "/";
      margin: 0 8px;
      color: #999;
    }
    
    &.active strong {
      color: #333;
      font-weight: 600;
    }
    
    a {
      color: #666;
      transition: color 0.2s;
      
      &:hover {
        color: #f44336;
        text-decoration: none;
      }
    }
  }
}

.page_customer_account {
  padding: 30px 0 50px;
  
  .shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
    background: white;
    border-radius: 8px;
    padding: 25px;
    overflow: hidden;
  }
}

.block-account {
  background: #f9f9f9;
  padding: 20px;
  border-radius: 6px;
  height: 100%;
  
  .title-account {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
  }
  
  p {
    margin-bottom: 15px;
    color: #666;
  }
  
  ul {
    padding: 0;
    list-style: none;
    
    li {
      margin-bottom: 10px;
      
      a {
        display: block;
        padding: 8px 15px;
        color: #555;
        border-radius: 4px;
        transition: all 0.3s;
        
        &:hover {
          background: #f0f0f0;
          text-decoration: none;
        }
        
        &.active {
          background: #f44336;
          color: white;
        }
      }
    }
  }
}

.col-right-ac {
  .title-head {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
  }
  
  .table-order {
    margin-top: 15px;
    box-shadow: 0 0 10px rgba(0,0,0,.05);
    
    thead {
      background-color: #f8f9fa;
      
      th {
        font-weight: 600;
        color: #333;
        padding: 15px 10px;
        border-bottom: 2px solid #ddd;
      }
    }
    
    tbody {
      tr {
        transition: background 0.2s;
        
        &:hover {
          background-color: #f9f9f9;
        }
        
        td {
          vertical-align: middle;
          padding: 15px 10px;
          border-top: 1px solid #eee;
          color: #555;
          
          a {
            color: #f44336;
            font-weight: 600;
            
            &:hover {
              text-decoration: underline;
            }
          }
          
          .price {
            font-weight: 600;
            color: #333;
          }
          
          .span_pending {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            background-color: #fef5e5;
            color: #f44336;
          }
        }
      }
    }
  }
}

/* Status colors */
.span_pending {
  &:contains("Đang xác nhận") {
    background-color: #fff8e1;
    color: #f44336;
  }
  
  &:contains("Đã thanh toán") {
    background-color: #e1f5fe;
    color: #03a9f4;
  }
  
  &:contains("Đang vận chuyển") {
    background-color: #e8f5e9;
    color: #4caf50;
  }
  
  &:contains("Hoàn thành") {
    background-color: #e8f5e9;
    color: #2e7d32;
  }
  
  &:contains("thất bại") {
    background-color: #ffebee;
    color: #f44336;
  }
}

/* Responsive adjustments */
@media (max-width: 991px) {
  .col-left-ac {
    margin-bottom: 30px;
  }
  
  .block-account {
    height: auto;
  }
}

@media (max-width: 767px) {
  .table-responsive {
    border: 0;
  }
  
  .table-order {
    th, td {
      padding: 10px 5px;
      font-size: 13px;
    }
  }
  
  .title-head {
    font-size: 18px;
  }
}
</style>
@endsection