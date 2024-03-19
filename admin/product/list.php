<!-- Danh sách sản phẩm -->
<div class="p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center mb-2">
        <a class="text-light text-decoration-none btn btn-primary btn-sm mr-2" href="index.php?act=product-add">
            <i class="fa-solid fa-plus"></i> Thêm mới sản phẩm
        </a>
        <!-- Search & Filter -->
        <form class="form-inline" action="index.php?req=product" method="POST">
            <input type="text" name="keyword" class="form-control form-control-sm mr-1 " placeholder="Tìm kiếm tên theo từ khóa..." style="width: 200px">
            <select name="category_id" class="form-control form-control-sm mr-1">
                <option value="0" selected>Tất cả loại món</option>
                <option value="0" selected>Thịt Heo</option>
            </select>
            <input type="submit" name="search" class="btn btn-primary btn-sm mr-3" value="Tìm kiếm" />
        </form>
            <div id="search-results">
            </div>
    </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="font-weight-bold w-20px" scope="col">#</th>
                    <th class="font-weight-bold" scope="col">ID</th>
                    <th class="font-weight-bold" scope="col">Tên món ăn</th>
                    <th class="font-weight-bold" scope="col">Hình ảnh</th>
                    <th class="font-weight-bold" scope="col">Giá gốc</th>
                    <th class="font-weight-bold" scope="col">Giảm giá</th>
                    <th class="font-weight-bold" scope="col">Trọng lượng (g)</th>
                    <th class="font-weight-bold" scope="col">Lượt xem</th>
                    <th class="font-weight-bold" scope="col">Ngày tạo</th>
                    <th class="font-weight-bold" scope="col">Ngày cập nhật</th>
                    <th class="font-weight-bold" scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                    <tr class="text-center">
                        <td scope="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                            </div>
                        </td>
                        <th>1</th>
                        <td class="text-primary">Bắp bò nhập khẩu cắt mỏng</td>
                        <td><img src="../assets/images/bo-6.png" alt="" width="100" height="100"></td>
                        <td>150000</td>
                        <td>0</td>
                        <td>100</td>
                        <td>0</td>
                        <td>19/03/2024</td>
                        <td>19/03/2024</td>
                        <td>
                            <a href="index.php?act=product-delete&id=<?= $id ?>" title="Xóa" class="btn btn-outline-danger btn-sm border border-0 delete-product-button" data-product-id="<?= $id ?>"><i class="fa-regular fa-trash-can"></i></a>
                            <a href="index.php?act=product-detail&id=<?= $id ?>" title="Sửa" class="btn btn-outline-info btn-sm border border-0"><i class="fa-regular fa-pen-to-square"></i></a>
                        </td>
                    </tr>
            </tbody>
        </table>
</div>
<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Bạn có chắc chắn xóa?',
            text: 'Bạn sẽ không thể khôi phục lại!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Hủy bỏ',
            confirmButtonText: 'Xác nhận',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?req=product-delete&id=' + productId;
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-product-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productId = button.getAttribute('data-product-id');
                confirmDelete(productId);
            });
        });
    });
</script>