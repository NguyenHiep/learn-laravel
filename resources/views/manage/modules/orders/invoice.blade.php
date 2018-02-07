@extends('manage.master')
@section('title', 'Hóa đơn đơn hàng')
@section('content')
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content page-content-invoice">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="{{ route('orders.index') }}">Danh sách đơn hàng</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Xuất hóa đơn</span>
          </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> Hóa đơn</h3>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="invoice">
        <div class="row invoice-logo">
          <div class="col-xs-6 invoice-logo-space">
            <img src="{{ asset('manages/assets/pages/media/invoice/walmart.png') }}" class="img-responsive" alt="" /> </div>
          <div class="col-xs-6">
            <p> ID đơn hàng #5652256 / 28 Feb 2013
            </p>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-xs-4">
            <h3>Địa chỉ thanh toán:</h3>
            <ul class="list-unstyled">
              <li> John Doe </li>
              <li> Mr Nilson Otto </li>
              <li> FoodMaster Ltd </li>
              <li> Madrid </li>
              <li> Spain </li>
              <li> 1982 OOP </li>
            </ul>
          </div>
          <div class="col-xs-4">
            <h3>Địa chỉ giao hàng</h3>
            <ul class="list-unstyled">
              <li> Drem psum dolor sit amet </li>
              <li> Laoreet dolore magna </li>
              <li> Consectetuer adipiscing elit </li>
              <li> Magna aliquam tincidunt erat volutpat </li>
              <li> Olor sit amet adipiscing eli </li>
              <li> Laoreet dolore magna </li>
            </ul>
          </div>
          <div class="col-xs-4 invoice-payment">
            <h3>Phương thức thanh toán</h3>
            <ul class="list-unstyled">
              <li>
                <strong>V.A.T Reg #:</strong> 542554(DEMO)78 </li>
              <li>
                <strong>Account Name:</strong> FoodMaster Ltd </li>
              <li>
                <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
              <li>
                <strong>V.A.T Reg #:</strong> 542554(DEMO)78 </li>
              <li>
                <strong>Account Name:</strong> FoodMaster Ltd </li>
              <li>
                <strong>SWIFT code:</strong> 45454DEMO545DEMO </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table table-striped table-hover">
              <thead>
              <tr>
                <th> # </th>
                <th> Item </th>
                <th class="hidden-xs"> Description </th>
                <th class="hidden-xs"> Quantity </th>
                <th class="hidden-xs"> Unit Cost </th>
                <th> Total </th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td> 1 </td>
                <td> Hardware </td>
                <td class="hidden-xs"> Server hardware purchase </td>
                <td class="hidden-xs"> 32 </td>
                <td class="hidden-xs"> $75 </td>
                <td> $2152 </td>
              </tr>
              <tr>
                <td> 2 </td>
                <td> Furniture </td>
                <td class="hidden-xs"> Office furniture purchase </td>
                <td class="hidden-xs"> 15 </td>
                <td class="hidden-xs"> $169 </td>
                <td> $4169 </td>
              </tr>
              <tr>
                <td> 3 </td>
                <td> Foods </td>
                <td class="hidden-xs"> Company Anual Dinner Catering </td>
                <td class="hidden-xs"> 69 </td>
                <td class="hidden-xs"> $49 </td>
                <td> $1260 </td>
              </tr>
              <tr>
                <td> 3 </td>
                <td> Software </td>
                <td class="hidden-xs"> Payment for Jan 2013 </td>
                <td class="hidden-xs"> 149 </td>
                <td class="hidden-xs"> $12 </td>
                <td> $866 </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <div class="well">
              <address>
                <strong>Địa chỉ shop</strong>
                <br/> 795 Park Ave, Suite 120
                <br/> San Francisco, CA 94107
                <br/>
                <abbr title="Phone">P:</abbr> (234) 145-1810 </address>
              <address>
                <strong>Full Name</strong>
                <br/>
                <a href="mailto:#"> first.last@email.com </a>
              </address>
            </div>
          </div>
          <div class="col-xs-8 invoice-block">
            <ul class="list-unstyled amounts">
              <li>
                <strong>Sub - Total amount:</strong> $9265 </li>
              <li>
                <strong>Discount:</strong> 12.9% </li>
              <li>
                <strong>VAT:</strong> ----- </li>
              <li>
                <strong>Grand Total:</strong> $12489 </li>
            </ul>
            <br/>
            <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> In hóa đơn
              <i class="fa fa-print"></i>
            </a>
            <a class="btn btn-lg green hidden-print margin-bottom-5"> Submit Your Invoice
              <i class="fa fa-check"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>

@endsection
@section('styles')
  @parent
  <link href="{{ asset('/manages/assets/pages/css/invoice.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
@stop
@section('scripts')
  @parent
  
@stop