@extends('layouts.main.master')
@section('title')
Quản lý đơn hàng {{$setting->webname}}
@endsection
@section('description')
Quản lý đơn hàng {{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link href="{{env('AWS_R2_URL')}}/frontend/css/account_order_style.scss.css" rel="stylesheet" type="text/css" />
<link href="{{env('AWS_R2_URL')}}/frontend/css/evo-accounts.scss.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="bread-crumb">
   <div class="container">
      <ul class="breadcrumb" itemscope="" itemtype="https://schema.org/BreadcrumbList">
         <li class="home" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="{{route('home')}}" title="Trang chủ " >
               <span itemprop="name">Trang chủ  ss</span>
               <meta itemprop="position" content="1">
            </a>
         </li>
         <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <a itemprop="item" href="/account" title="Trang Tài khoản">
               <span itemprop="name">Trang Tài khoản</span>
               <meta itemprop="position" content="2">
            </a>
         </li>
         <li class="active" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <strong itemprop="name">Chi tiết đơn hàng</strong>
            <meta itemprop="position" content="3">
         </li>
      </ul>
   </div>
</section>
<section class="login page_order">
   <div class="container">
      <div class="shadow-sm">
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-3 col-left-ac">
               <div class="block-account">
                  <h5 class="title-account">Trang tài khoản</h5>
                  <p>Xin chào, <a href="javascript:;" style="color:;">a</a>&nbsp;!</p>
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
            <div class="col-xs-12 col-sm-12 col-lg-9">
               <div class="head-title clearfix">
                  <h1>Chi tiết đơn hàng #{{$bill->code_bill}}</h1>
                  <span class="note order_date">
                  Ngày đặt hàng: {{date_format($bill->created_at,'d/m/Y')}}
                  </span>
               </div>
               <div class="payment_status">
                  <span class="note">Trạng thái thanh toán:</span>
                  <i class="status_pending">
                     <em>
                        @if ($bill->statu == 0)
                        <span class="span_pending" style="color: red"><strong><em>Đang xác nhận thanh toán</em></strong></span>
                        @elseif($bill->statu == 1)
                        <span class="span_pending" style="color: red"><strong><em>Đã thanh toán</em></strong></span>
                        @elseif($bill->statu == 2)
                        <span class="span_pending" style="color: red"><strong><em>Đang vận chuyển</em></strong></span>
                        @elseif($bill->statu == 3)
                        <span class="span_pending" style="color: red"><strong><em>Hoàn thành đơn hàng</em></strong></span>
                        @elseif($bill->statu == 4)
                        <span class="span_pending" style="color: red"><strong><em>Đơn hàng thất bại</em></strong></span>
                        @endif
                       </em>
                  </i>
               </div>
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-6 body_order">
                     <div class="box-address">
                        <h2 class="title-head">Địa chỉ giao hàng</h2>
                        <div class="address box-des">
                           <p> <strong>a</strong></p>
                           <p>
                              Địa chỉ:
                              {{$bill->cus_address}}											
                           </p>
                           <p>Số điện thoại: {{$bill->cus_phone}}</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 body_order">
                     <div class="box-address">
                        <h2 class="title-head">
                           Thanh toán
                        </h2>
                        <div class="box-des">
                           <a href="" style="color: blue">Xem cách thanh toán</a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-3 body_order">
                     <div class="box-address">
                        <h2 class="title-head">
                           Ghi chú
                        </h2>
                        <div class="box-des">
                           @if ($bill->note)
                           <p>
                              {{$bill->note}}
                           </p>
                           @else 
                           <p>
                              Không có ghi chú
                           </p>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 margin-top-20">
                     <div class="table-order">
                        <div class="table-responsive table_mobile">
                           <table id="order_details" class="table table-cart">
                              <thead class="thead-default">
                                 <tr>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($billdetail as $item)
                               
                                    <tr>
                                    <td class="link" data-title="Tên">
                                       <div class="image_order">
                                          <a title="{{$item->name}}" href=""><img src="{{url(''.$item->images)}}"></a>
                                       </div>
                                       <div class="content_right">
                                          <a class="title_order" href="" title="{{$item->name}}">{{$item->name}}</a>
                                         <i>{{$item->variant}}</i>
                                          <div class="bottom_mb">
                                             <div class="quantity_mb">
                                                x{{$item->qty}}
                                             </div>
                                             <div class="sum_mb">
                                                   {{number_format($item->price - ($item->price*($item->discount/100)))}}₫
                                             </div>
                                          </div>
                                       </div>
                                    </td>
                                    <td data-title="Giá" class="numeric"> {{number_format($item->price - ($item->price*($item->discount/100)))}}₫</td>
                                    <td data-title="Số lượng" class="numeric">{{$item->qty}}</td>
                                    <td data-title="Tổng" class="numeric">{{number_format(($item->price - ($item->price*($item->discount/100)))*$item->qty)}}₫</td>
                                 </tr>
                                    @endforeach
                              </tbody>
                           </table>
                        </div>
                        <table class="table totalorders">
                           <tfoot>
                              <tr class="order_summary discount">
                                 <td>Khuyến mại </td>
                                 <td class="total money right">0₫</td>
                              </tr>
                              <tr class="order_summary ">
                                 <td colspan="">Phí vận chuyển</td>
                                 <td class="total money right">
                                    30.000₫
                                 </td>
                              </tr>
                              <tr class="order_summary ">
                                 <td colspan="">Tiền hàng</td>
                                 <td class="total money right">
                                    {{number_format($bill->total_money)}}₫
                                 </td>
                              </tr>
                              <tr class="order_summary order_total">
                                 <td>Tổng tiền</td>
                                 <td class="right"><strong>{{number_format($bill->total_money+30000)}}₫</strong></td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<style>
   /* Account Order Detail Styling */
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
        color: #ff6a00;
        text-decoration: none;
      }
    }
  }
}

/* Main content styling */
.page_order {
  padding: 30px 0 50px;
  
  .shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
    background: white;
    border-radius: 8px;
    padding: 25px;
    overflow: hidden;
  }

  .head-title {
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
    
    h1 {
      font-size: 24px;
      margin-bottom: 8px;
      font-weight: 600;
      color: #333;
    }
    
    .note.order_date {
      color: #777;
      font-size: 14px;
    }
  }
  
  .payment_status {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    
    .note {
      font-weight: 500;
      margin-right: 10px;
      color: #555;
    }
    
    .status_pending {
      font-style: normal;
    }
    
    .span_pending {
      padding: 6px 12px;
      border-radius: 4px;
      font-size: 13px;
      font-weight: 600;
      display: inline-block;
      
      /* Status-specific colors */
      &:contains("Đang xác nhận") {
        background-color: #fff8e1;
        color: #ff9800 !important;
      }
      
      &:contains("Đã thanh toán") {
        background-color: #e1f5fe;
        color: #03a9f4 !important;
      }
      
      &:contains("Đang vận chuyển") {
        background-color: #e8f5e9;
        color: #4caf50 !important;
      }
      
      &:contains("Hoàn thành") {
        background-color: #e8f5e9;
        color: #2e7d32 !important;
      }
      
      &:contains("thất bại") {
        background-color: #ffebee;
        color: #f44336 !important;
      }
    }
  }
}

/* Sidebar account menu */
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
          background: #ff6a00;
          color: white;
        }
      }
    }
  }
}

/* Order detail boxes */
.body_order {
  margin-bottom: 25px;
  
  .box-address {
    height: 100%;
    background: #f9f9f9;
    border-radius: 6px;
    padding: 15px;
    
    .title-head {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 12px;
      padding-bottom: 8px;
      border-bottom: 1px solid #eee;
      color: #333;
    }
    
    .box-des {
      font-size: 14px;
      color: #555;
      
      p {
        margin-bottom: 5px;
        
        &:last-child {
          margin-bottom: 0;
        }
      }
      
      strong {
        color: #333;
      }
    }
  }
}

/* Order items table */
.table-order {
  margin-top: 20px;
  
  .table-cart {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    box-shadow: 0 0 10px rgba(0,0,0,.05);
    border-radius: 6px;
    overflow: hidden;
    
    thead {
      background-color: #f8f9fa;
      
      th {
        font-weight: 600;
        color: #333;
        padding: 15px;
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
          padding: 15px;
          border-top: 1px solid #eee;
          color: #555;
          
          &.link {
            display: flex;
            align-items: center;
            
            .image_order {
              width: 70px;
              min-width: 70px;
              margin-right: 15px;
              
              img {
                max-width: 100%;
                height: auto;
                border-radius: 4px;
                border: 1px solid #eee;
              }
            }
            
            .content_right {
              .title_order {
                display: block;
                margin-bottom: 8px;
                color: #333;
                font-weight: 500;
                
                &:hover {
                  color: #ff6a00;
                  text-decoration: none;
                }
              }
              
              .bottom_mb {
                display: none;
              }
            }
          }
          
          &.numeric {
            text-align: right;
            font-weight: 500;
          }
        }
      }
    }
  }
  
  .totalorders {
    margin-top: 15px;
    background: #f9f9f9;
    border-radius: 6px;
    
    tfoot {
      tr {
        td {
          padding: 12px 15px;
          border-top: 1px solid #eee;
          
          &:first-child {
            text-align: left;
            font-weight: 500;
            color: #555;
          }
          
          &.right {
            text-align: right;
          }
          
          &.money {
            font-weight: 500;
          }
        }
        
        &.order_total {
          background-color: #f8f9fa;
          
          td {
            padding: 15px;
            font-size: 16px;
            color: #333;
            
            strong {
              color: #ff6a00;
              font-size: 18px;
            }
          }
        }
      }
    }
  }
}

/* Responsive styles */
@media (max-width: 991px) {
  .col-left-ac {
    margin-bottom: 30px;
  }
  
  .block-account {
    height: auto;
  }
}

@media (max-width: 767px) {
  .page_order .head-title h1 {
    font-size: 20px;
  }
  
  .table-cart thead {
    display: none;
  }
  
  .table_mobile {
    .table-cart {
      tbody {
        tr {
          display: block;
          margin-bottom: 15px;
          border: 1px solid #eee;
          border-radius: 6px;
          
          td {
            display: block;
            text-align: right;
            padding: 10px 15px;
            
            &:before {
              content: attr(data-title) ": ";
              float: left;
              font-weight: 600;
              color: #333;
            }
            
            &.link {
              display: flex;
              text-align: left;
              
              &:before {
                display: none;
              }
              
              .content_right .bottom_mb {
                display: flex;
                justify-content: space-between;
                margin-top: 8px;
                
                .quantity_mb, .sum_mb {
                  font-weight: 500;
                  color: #333;
                }
              }
            }
            
            &:not(.link) {
              display: none;
            }
          }
        }
      }
    }
  }
  
  .totalorders tfoot tr td {
    padding: 10px;
    font-size: 14px;
  }
}
</style>
@endsection