<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Model{
/**
 * App\Model\BaseModel
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\BaseModel onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\BaseModel withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\BaseModel withoutTrashed()
 */
	class BaseModel extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Categories
 *
 * @property int $id
 * @property string $name Tên chuyên mục
 * @property string $slug Tên chuyên mục không dấu
 * @property int $parent_id Id chuyên mục cha, mặc định là 0
 * @property string|null $image Hình ảnh
 * @property string|null $description Mô tả nội dung chuyên mục
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Categories whereUpdatedAt($value)
 */
	class Categories extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Comments
 *
 * @property int $id
 * @property string $name Tên người bình luận
 * @property string $email Email người bình luận
 * @property string $content Nội dung bình luận
 * @property string|null $url Địa chỉ website
 * @property int $comment_status Trạng thái bình luận[1: Đã đăng, 2: Xét duyệt]
 * @property string $ip_user Địa chỉ IP người bình luận
 * @property int|null $posts_id Id bài viết
 * @property int $comment_parent Trả lời hay bình luận [0: Bình luận, khác không là trả lời]
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comments onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereCommentParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereCommentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereIpUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments wherePostsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Comments whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comments withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Comments withoutTrashed()
 */
	class Comments extends \Eloquent {}
}

namespace App\Model\Medias{
/**
 * App\Model\Medias\Mediasinfo
 *
 * @property int $id Id tập tin
 * @property string $extension Phần mở rộng tập tin [PNG, GIF, ...]
 * @property string|null $width Chiều rộng
 * @property string|null $height Chiều cao
 * @property string|null $size Dung lượng tệp
 * @property string|null $title Tiêu đề
 * @property string|null $caption Chú thích
 * @property string|null $alt Văn bản thay thế
 * @property string|null $description Mô tả tập tin
 * @property int|null $lightbox Popup đối với ảnh hoặc video
 * @property string|null $video_length Thời gian video [3:25]
 * @property int|null $video_type Loại video [1: youtube, 2: vimeo, 3: facebook]
 * @property string|null $video_code_id Mã code id của video
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Model\Medias $posts_medias
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Medias\Mediasinfo onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereLightbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereVideoCodeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereVideoLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereVideoType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias\Mediasinfo whereWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Medias\Mediasinfo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Medias\Mediasinfo withoutTrashed()
 */
	class Mediasinfo extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Medias
 *
 * @property int $id
 * @property string $name Tên tập tin
 * @property string $types Loại tập tin (image, docs, video)
 * @property int $user_id Tác giả upload tập tin
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Model\Medias\Mediasinfo $posts_medias_info
 * @property-read \App\Model\User $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Medias onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Medias whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Medias withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Medias withoutTrashed()
 */
	class Medias extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Pages
 *
 * @property int $id
 * @property string $page_title Tiêu đề trang
 * @property string $page_slug Tiêu đề trang không dấu
 * @property string|null $page_intro Mô tả ngắn trang
 * @property string $page_full Nội dung trang
 * @property int|null $page_medias_id Ảnh trang
 * @property int $page_status Trạng thái trang [1: Đã đăng, 2: Xét duyệt]
 * @property string $page_attribute Thuộc tính trang
 * @property string|null $page_keyword Từ khóa bài viết
 * @property int $visit Lượt xem trang
 * @property int $user_id Tác giả trang
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Pages onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageAttribute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageMediasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages wherePageTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pages whereVisit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Pages withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Pages withoutTrashed()
 */
	class Pages extends \Eloquent {}
}

namespace App\Model\Posts\Category{
/**
 * App\Model\Posts\Category\Posts_Category_Id
 *
 * @property int $id Id bài viết
 * @property int $posts_id Id bài viết
 * @property int $posts_category_id Id chuyên mục
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category\Posts_Category_Id whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category\Posts_Category_Id whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category\Posts_Category_Id wherePostsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category\Posts_Category_Id wherePostsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category\Posts_Category_Id whereUpdatedAt($value)
 */
	class Posts_Category_Id extends \Eloquent {}
}

namespace App\Model\Posts{
/**
 * App\Model\Posts\Category
 *
 * @property int $id
 * @property string $name Tên chuyên mục
 * @property string $slug Tên chuyên mục không dấu
 * @property int $parent_id Id chuyên mục cha, mặc định là 0
 * @property string|null $image Hình ảnh
 * @property string|null $description Mô tả nội dung chuyên mục
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Posts\Category[] $children
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Posts[] $posts
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts\Category onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts\Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Model\Posts\Tags{
/**
 * App\Model\Posts\Tags\Posts_Tags_Id
 *
 * @property int $id Id bài viết
 * @property int $posts_id Id bài viết
 * @property int $posts_tags_id Id tags
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags\Posts_Tags_Id whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags\Posts_Tags_Id whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags\Posts_Tags_Id wherePostsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags\Posts_Tags_Id wherePostsTagsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags\Posts_Tags_Id whereUpdatedAt($value)
 */
	class Posts_Tags_Id extends \Eloquent {}
}

namespace App\Model\Posts{
/**
 * App\Model\Posts\Tags
 *
 * @property int $id
 * @property string $name Tên thẻ
 * @property string $slug Tên thẻ không dấu
 * @property string|null $description Mô tả thẻ
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Posts[] $posts
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts\Tags onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts\Tags whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts\Tags withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts\Tags withoutTrashed()
 */
	class Tags extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Posts
 *
 * @property int $id
 * @property string $post_title Tiêu đề bài viết
 * @property string $post_slug Tiêu đề bài viết không dấu
 * @property string|null $post_intro Mô tả ngắn bài viết
 * @property string $post_full Nội dung bài viết
 * @property int|null $posts_medias_id Ảnh bài viêt
 * @property int $post_status Trạng thái bài viết [1: Đã đăng, 2: Xét duyệt]
 * @property string $post_format Định dạng bài viết [1: Chuẩn, 2: Video, 3: Audio, 4: Bộ sưu tập]
 * @property string|null $post_keyword Từ khóa bài viết
 * @property int $visit Lượt xem bài viết
 * @property int $user_id Tác giả bài viết
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \App\Model\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Posts\Category[] $posts_categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Posts\Tags[] $posts_tags
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts wherePostsMediasId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Posts whereVisit($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Posts withoutTrashed()
 */
	class Posts extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Products
 *
 * @property int $id
 * @property string $name Tên sản phẩm
 * @property string $slug Tên sản phẩm không dấu
 * @property string $description Mô tả sản phẩm
 * @property string|null $short_description Mô tả ngắn sản phẩm
 * @property string|null $category_id Chuyên mục sản phẩm
 * @property string $sku Mã SKU
 * @property string $price Giá sản phẩm
 * @property string|null $sale_price Giá khuyến mãi phẩm
 * @property int $quantity Số lượng sản phẩm
 * @property int $status Trạng thái sản phẩm [1: Đã đăng, 2: Xét duyệt]
 * @property string|null $meta_title Meta title
 * @property string|null $meta_keywords Meta key words
 * @property string|null $meta_description Meta description
 * @property int|null $brand_id Thương hiệu sản phẩm
 * @property string|null $galary_img Ảnh galary
 * @property string|null $pictures Ảnh sản phẩm
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereGalaryImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereSalePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Products whereUpdatedAt($value)
 */
	class Products extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\Settings
 *
 * @property int $id
 * @property string $company_name Thông tin website - Tên công ty
 * @property string $company_zip Thông tin website - Mã bưu chính
 * @property string $company_address Thông tin website - Địa chỉ
 * @property string|null $company_tel Thông tin website - Số điện thoại
 * @property string|null $company_fax Thông tin website - Số Fax
 * @property string $company_copyright Bản quyền website
 * @property string|null $subtitle Thông tin website - Tiêu đề mặc định page home
 * @property float|null $company_lat Thông tin website - Vĩ độ
 * @property float|null $company_lng Thông tin website - Kinh độ
 * @property int $i18n_flg Đa ngôn ngữ[1 Đa ngôn ngữ,2: Không đa ngôn ngữ]
 * @property string|null $email1 Email người gửi - Email
 * @property string|null $email1_name Email người gửi - Tên hiển thị trên email
 * @property string $about_privacy Thông tin cá nhân - Thông tin cá nhân và Điều khoản sử dụng
 * @property string $about_terms Thông tin cá nhân - Điều khoản Dịch vụ - Điều khoản và Điều kiện
 * @property string|null $mail_smtp_host Email người gửi - Host SMTP
 * @property string|null $mail_smtp_port Email người gửi - Port SMTP
 * @property string|null $mail_smtp_user Email người gửi - User SMTP
 * @property string|null $mail_smtp_pass Email người gửi - PassWord SMTP
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Settings onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereAboutPrivacy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereAboutTerms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyCopyright($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCompanyZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereEmail1Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereI18nFlg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereMailSmtpHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereMailSmtpPass($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereMailSmtpPort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereMailSmtpUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Settings whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Settings withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Settings withoutTrashed()
 */
	class Settings extends \Eloquent {}
}

namespace App\Model{
/**
 * App\Model\User
 *
 * @property int $id
 * @property string $username Tên tài khoản
 * @property string $email Email tài khoản
 * @property string $password Mật khẩu
 * @property int $level Cấp bậc [1: Quản trị viên, 2: Biên tập viên, 3: Cộng tác viên]
 * @property string|null $avatar Ảnh đại diện
 * @property int $status Trạng thái [1: Kích hoạt, 2: Không kích hoạt]
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Medias[] $users
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User levelAdmin()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

