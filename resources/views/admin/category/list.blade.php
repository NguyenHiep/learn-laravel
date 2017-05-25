@extends('admin.master')
@section('title','Danh mục')

@section('content')
	<table class="list_table">
			<tr class="list_heading">
				<td class="id_col">STT</td>
				<td>Danh Mục</td>
				<td class="action_col">Quản lý?</td>
			</tr>
			<tr class="list_data">
                <td class="aligncenter">1</td>
                <td class="list_td alignleft">Nguyễn Hiệp</td>
                <td class="list_td aligncenter">
                    <a href=""><img src="{{asset('admin/images/edit.png')}}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{{asset('admin/images/delete.png')}}" /></a>
                </td>
            </tr>
			<tr class="list_data">
                <td class="aligncenter">2</td>
                <td class="list_td alignleft">--| Nguyễn Hiệp</td>
                <td class="list_td aligncenter">
                    <a href=""><img src="{{asset('admin/images/edit.png')}}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{{asset('admin/images/delete.png')}}" /></a>
                </td>
            </tr>
			<tr class="list_data">
                <td class="aligncenter">3</td>
                <td class="list_td alignleft">--| --| Nguyễn Hiệp</td>
                <td class="list_td aligncenter">
                    <a href=""><img src="{{asset('admin/images/edit.png')}}" /></a>&nbsp;&nbsp;&nbsp;
                    <a href=""><img src="{{asset('admin/images/delete.png')}}" /></a>
                </td>
            </tr>
		</table>
@endsection