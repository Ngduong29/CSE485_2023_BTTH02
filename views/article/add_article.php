<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <h3 class="text-center text-uppercase fw-bold">Thêm bài viết mới</h3>
    <div class="row">
        <div class="col-sm">
          
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" name="tieude">
                </div>

                <div class="form-group mt-3">
                    <label>Tên bài hát</label>
                    <input type="text" class="form-control" name="ten_bhat">
                </div>

                <div class="form-group mt-3">
                    <label>Tên thể loại</label>
                    <select class="form-select" aria-label="Default select example" id="ten_tloai" name="ma_tloai">
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Tóm tắt</label>
                    <input type="text" class="form-control" name="tomtat">
                </div>

                <div class="form-group mt-3">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" name="noidung">
                </div>

                <div class="form-group mt-3">
                    <label>Tác giả</label>
                    <select class="form-select" aria-label="Default select example" id="ten_tgia" name="ma_tgia">
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label>Ngày viết</label>
                    <input type="date" class="form-control" name="ngayviet">
                </div>

                <div class="form-group mt-3">
                    <label>Hình ảnh</label>
                    <input type="file" class="form-control" name="hinhanh" >
                </div>

                <div class="form-group  float-end mt-3">
                    <input type="submit" name="submit" value="Thêm" class="btn btn-success">
                    <a href="category.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
   
    </form>
</body>
</html>
