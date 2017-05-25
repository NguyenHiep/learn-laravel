@extends('admin.master')
@section('title','Thêm danh mục')

@section('content')
		<form action="" method="POST" style="width: 650px;">
			<fieldset>
				<legend>Thông Tin Danh Mục</legend>
				<span class="form_label">Danh mục cha:</span>
				<span class="form_item">
					<select name="sltCate" class="select">
						<option value="0">--- ROOT ---</option>
						<option value="29">---| Chuyện lạ</option>
						<option value="22">Giải trí</option>
						<option value="18">Giáo dục</option>
						<option value="20">Kinh doanh</option>
						<option value="19">---| Nhân ái</option>
						<option value="24">---| ---| Nhịp sống trẻ</option>
						<option value="23">Pháp luật</option>
						<option value="28">Sự kiện</option>
						<option value="26">Sức khỏe</option>
						<option value="27">Sức mạnh số</option>
						<option value="16">Thế giới</option>
						<option value="17">Thể thao</option>
						<option value="25">Tình yêu</option>
						<option value="21">Văn hóa</option>
						<option value="15">Xã hội</option>
					</select>
				</span><br />
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<input type="text" name="txtCateName" class="textbox" />
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnCateAdd" value="Thêm danh mục" class="button" />
				</span>
			</fieldset>
		</form>  
@endsection