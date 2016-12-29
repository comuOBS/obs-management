<?php

$user_name = $_SESSION["userName"];
$user_token = $_SESSION["key"];
$department_json=getApi($user_token,'http://127.0.0.1:8000/departments/?format=json');
?>
<html lang="en">
  
  <body>

  <!-- container section start -->
  <section id="container" class="">
     
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Öğrenci Ekleme</h3>
					
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Öğrenci Bilgileri Giriş
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " action="veri_kayit.php" method="post">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Öğrenci Numarası</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="ogr_no" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">T.C No.</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="tc" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password1</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="pwd1" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password2</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="pwd2" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Ad</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="ad" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Soyad</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="soyad" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Telefon No.</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="tel" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Bölüm</label>
                                      <div class="col-sm-10">
                                          <select class="form-control input-lg m-bot15" name="department_code">
                                            <?php for($i=0;$i<$department_json["count"];$i++){  ?> 

                                                 <option value=<?php echo intval($department_json["results"][$i]["department_code"]);?> ><?php echo $department_json["results"][$i]["department_name"]; ?></option>
                                                
                                            <?php } ?>
                                         </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Aktif Dönem</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="donem" class="form-control" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Kayıt Yılı</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="yil" class="form-control" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Doğum Tarihi</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="dogum_tarih" class="form-control" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="email" class="form-control" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Cinsiyet</label>
                                      <div class="col-sm-10">
                                              <label class="label_radio" for="radio-01">
                                                  <input name="cinsiyet" id="radio-01" value="F" type="radio" /> Kız
                                              </label>
                                              <label class="label_radio" for="radio-02">
                                                  <input name="cinsiyet" id="radio-02" value="M" type="radio" /> Erkek
                                              </label>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Resim Yükle</label>
                                      <label for="exampleInputFile">File input</label>
                                      <input type="file" name="resim" id="exampleInputFile">
                                  </div>
                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Kaydet</button>
                                                          <button type="button" class="btn btn-danger">İptal</button>
                                                      </div>
                                                  </div>
                                  
                              </form>
                          </div>
                      </section>
                              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    
  

  </body>
</html>
