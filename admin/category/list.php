<!-- Danh sách danh mục -->
<div class="p-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản lý danh mục</li>
        </ol>
    </nav>
    <div class="btn-add mb-3">
        <a class="text-light text-decoration-none btn btn-primary btn-sm" href="index.php?act=category-add">
            <i class="fa-solid fa-plus"></i> Thêm mới danh mục
        </a>
    </div>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="font-weight-bold w-20px" scope="col">#</th>
                    <th class="font-weight-bold" scope="col">ID</th>
                    <th class="font-weight-bold" scope="col">Tên danh mục</th>
                    <th class="font-weight-bold" scope="col">Hình ảnh</th>
                    <th class="font-weight-bold" scope="col">Ngày tạo</th>
                    <th class="font-weight-bold" scope="col">Ngày cập nhật</th>
                    <th class="font-weight-bold" scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                        <?php
                            foreach ($listdanhmuc as $danhmuc ) {
                                extract($danhmuc);
                                $hinhpath = "../upload/" . $image;

                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height='100'>";
                        } else {
                            $hinh = "no photo";
                        }
                                echo
                                '<tr>
                                    <td scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="">
                                        </div>
                                    </td>
                                    <td>'.$id.'</td>
                                    <td class="text-primary">'.$name.'</td>
                                    <td>'.$hinh.'</td>
                                    <td>'.$created_at.'</td>
                                    <td>'.$updated_at.'</td>
                                    <td>
                                        <a href="index.php?act==<?= $id ?>" title="Xóa" class="btn btn-outline-danger btn-sm border border-0 delete-category-button" data-category-id="<?= $id ?>"><i class="fa-regular fa-trash-can"></i></a>
                                        <a href="index.php?act==<?= $id ?>" title="Sửa" class="btn btn-outline-info btn-sm border border-0"><i class="fa-regular fa-pen-to-square"></i></a>
                                    </td>
                                </tr>';}
                        ?>
                </tr>

        </tbody>
        </table>
        
</div>
<script>
    function confirmDelete(categoryId) {
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
                window.location.href = 'index.php?req=category-delete&id=' + categoryId;
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-category-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const categoryId = button.getAttribute('data-category-id');
                confirmDelete(categoryId);
            });
        });
    });
</script>