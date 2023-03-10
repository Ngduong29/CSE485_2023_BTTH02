<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:/CSE485_2023_BTTH02/index.php?controller=home&action=login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" aria-current="page" href="index.php?controller=admin&action=list">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=category&action=list">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=author&action=list">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=article&action=list">Bài viết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=user&action=list">Người dùng</a>
                        </li>
                    </ul>
                    <a class="nav-link " href="index.php?controller=home&action=login">Logout</a>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viết</h3>
                <?php foreach ($findArticle as $article) { ?>
                    <form action="index.php?controller=article&action=edit&id=<?= $article->getMa_bviet() ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group mt-3">
                            <label>Mã bài viết</label>
                            <input type="text" class="form-control" name="ma_bviet" readonly value="<?= $article->getMa_bviet() ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="tieude" value="<?= $article->getTieude() ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Tên bài hát</label>
                            <input type="text" class="form-control" name="ten_bhat" value="<?= $article->getTen_bhat() ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Tên thể loại</label>
                            <select class="form-select" aria-label="Default select example" name="ma_tloai" value="<?= $ma_tloai ?>">
                                <?php foreach ($categorys as $category) {
                                    $selected = ($category->getMa_tloai() == $ma_tloai) ? 'selected' : '';
                                    echo "<option value='" . $category->getMa_tloai() . "'$selected>" . $category->getTen_tloai() . "</option>";
                                } ?>

                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Tóm tắt</label>
                            <input type="text" class="form-control" name="tomtat" value="<?= $article->getTomtat() ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Nội dung</label>
                            <input type="text" class="form-control" name="noidung" value="<?= $article->getNoidung() ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Tác giả</label>
                            <select class="form-select" aria-label="Default select example" id="ten_tgia" name="ma_tgia" value="<?= $ma_tgia ?>">
                                <?php foreach ($authors as $author) {
                                    $selected = ($author->getMa_tgia() == $ma_tgia) ? 'selected' : '';
                                    echo "<option value='" . $author->getMa_tgia() . "'$selected>" . $author->getTen_tgia() . "</option>";
                                } ?>

                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label>Ngày viết</label>
                            <input type="date" class="form-control" name="ngayviet" value="<?php echo date('Y-m-d', strtotime($article->getNgayviet())) ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Hình ảnh</label>
                            <img style="width: 100px;" src="/CSE485_2023_BTTH02/views/images/songs/<?= $article->getHinhanh() ?>">
                            <input type="file" class="form-control" name="hinhanh">
                        </div>
                    <?php } ?>

                    <div class="form-group  float-end mt-3">
                        <input type="submit" name="submit" value="Lưu lại" class="btn btn-success">
                        <a href="index.php?controller=article&action=list" class="btn btn-warning ">Quay lại</a>
                    </div>
                    </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>