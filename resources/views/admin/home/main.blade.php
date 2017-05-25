@extends('admin.master')

@section('title', 'Trang chính')
@section('content')
   <table class="function_table" style="margin: 0px auto;">
			<tr>
				<td class="function_item user_add"><a href="">Thêm user</a></td>
				<td class="function_item user_list"><a href="">Quản lý user</a></td>
				<td rowspan="3" class="statistics_panel">
					<h3>Thống kê:</h3>
					<ul>
						<li>Tổng số user:</li>
						<li>Tổng số danh mục:</li>
						<li>Tổng số tin:</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td class="function_item cate_add"><a href="">Thêm danh mục</a></td>
				<td class="function_item cate_list"><a href="">Quản lý danh mục</a></td>
			</tr>
			<tr>
				<td class="function_item news_add"><a href="">Thêm tin</a></td>
				<td class="function_item news_list"><a href="">Quản lý tin</a></td>
			</tr>
</table>    
@endsection
