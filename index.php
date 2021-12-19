<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORBES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

    <style>
        body {
            height: 100vh;
        }

        .container {
            height: 100%;
        }
    </style>


</head>

<body onload="get_province()">



    <div class="container text-center d-flex align-items-center justify-content-center ">
        <div class="col-md-8 col-sm-10">
            <div class="card border-primary mb-3">
                <div align="center" class="m-2">
                    <img src="images/logo_forbes.PNG" class="card-img-top" alt="..." style="width: 30%;">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="text-align: left;">บริการหลังการขาย</h5>
                    <form id="form_submit">

                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4" align="left">
                                <div>
                                    <input class="form-check-input border border-primary" type="checkbox" name="service[]" value="ลงทะเบียนรับประกันสินค้า" id="service1">
                                    <label class="form-check-label" for="service1">
                                        ลงทะเบียนรับประกันสินค้า
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input border border-primary" type="checkbox" name="service[]" value="ต่ออายุการประกันสินค้า" id="service2">
                                    <label class="form-check-label" for="service2">
                                        ต่ออายุการประกันสินค้า
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input border border-primary" type="checkbox" name="service[]" value="แจ้งซ่อมสินค้า" id="service3">
                                    <label class="form-check-label" for="service3">
                                        แจ้งซ่อมสินค้า
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input border border-primary" type="checkbox" name="service[]" value="ขอติดตั้งสินค้า" id="service4">
                                    <label class="form-check-label" for="service4">
                                        ขอติดตั้งสินค้า
                                    </label>
                                </div>
                                <div>
                                    <input class="form-check-input border border-primary" type="checkbox" name="service[]" value="ขอรับบริการอื่นๆ" id="service5">
                                    <label class="form-check-label" for="service5">
                                        ขอรับบริการอื่นๆ
                                    </label>
                                </div>

                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border border-primary" style placeholder="ชื่อ" required name="name">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="text" class="form-control border border-primary" style placeholder="นามสกุล" required name="lastname">
                                </div>

                                <div class="input-group mb-3">
                                    <input type="number" class="form-control border border-primary" style placeholder="หมายเลขโทรศัพท์ที่ติดต่อได้" required name="telephone">
                                </div>

                                <div class="input-group mb-3">
                                    <select class="form-control border border-primary select2" name="province" id="province">
                                        <option value="" selected disabled>จังหวัด</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <p>ฝ่ายบริการจะติดต่อกลับท่านโดยเร็วที่สุด <br>ขอบคุณที่ใช้บริการครับ</p>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-lg" id="btn_submit">ยืนยัน</button>
                    </form>
                    <div class="m-3">
                        <a href="https://www.forbes.co.th/" style="font-size: 16pt;" target="_blank">www.forbes.co.th</a>
                        <br>
                        <a href="mailto: serviceonline@forbes.co.th" style="font-size: 16pt;">serviceonline@forbes.co.th</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        document.getElementById("btn_submit").addEventListener("click", function(event) {
            event.preventDefault()
            // console.log("ทดสอบ");

            Swal.fire({
                title: 'ท่านแน่ใจใช่หรือไม่?',
                text: "ท่านต้องการบันทีกใช่หรือไม่?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#form_submit')[0];
                    var data = new FormData(form);
                    let _url = "sent-email.php";
                    $.ajax({
                        enctype: 'multipart/form-data',
                        processData: false, // Important!
                        contentType: false,
                        cache: false,
                        timeout: 600000,
                        url: _url,
                        type: "POST",
                        data: data,
                        success: function(res) {
                            console.log("สำเร็จ");

                            Swal.fire(
                                'สำเร็จ!',
                                'ข้อมูลของท่านถูกบันทึกเรียบร้อยแล้ว',
                                'success'
                            )


                        },
                        error: function(err) {
                            console.log("ไม่สำเร็จ");
                            Swal.fire(
                                'ไม่สำเร็จ!',
                                'กรุณาลองใหม่อีกครั้ง หรือรีเฟชหน้าเว็บนี้ใหม่อีกครั้ง',
                                'error'
                            )
                        }
                    });
                }
            })


        });

        const province_th = ['กรุงเทพฯ',
            'กระบี่',
            'กาญจนบุรี',
            'กาฬสินธุ์',
            'กำแพงเพชร',
            'ขอนแก่น',
            'จันทบุรี',
            'ฉะเชิงเทรา',
            'ชลบุรี',
            'ชัยนาท',
            'ชัยภูมิ',
            'ชุมพร',
            'เชียงใหม่',
            'เชียงราย',
            'ตรัง',
            'ตราด',
            'ตาก',
            'นครนายก',
            'นครปฐม',
            'นครพนม',
            'นครราชสีมา',
            'นครศรีธรรมราช',
            'นครสวรรค์',
            'นนทบุรี',
            'นราธิวาส',
            'น่าน',
            'บึงกาฬ',
            'บุรีรัมย์',
            'ปทุมธานี',
            'ประจวบคีรีขันธ์',
            'ปราจีนบุรี',
            'ปัตตานี',
            'พระนครศรีอยุธยา',
            'พะเยา',
            'พังงา',
            'พัทลุง',
            'พิจิตร',
            'พิษณุโลก',
            'เพชรบุรี',
            'เพชรบูรณ์',
            'แพร่',
            'ภูเก็ต',
            'มหาสารคาม',
            'มุกดาหาร',
            'แม่ฮ่องสอน',
            'ยโสธร',
            'ยะลา',
            'ร้อยเอ็ด',
            'ระนอง',
            'ระยอง',
            'ราชบุรี',
            'ลพบุรี',
            'ลำปาง',
            'ลำพูน',
            'เลย',
            'ศรีสะเกษ',
            'สกลนคร',
            'สงขลา',
            'สตูล',
            'สมุทรปราการ',
            'สมุทรสงคราม',
            'สมุทรสาคร',
            'สระแก้ว',
            'สระบุรี',
            'สิงห์บุรี',
            'สุโขทัย',
            'สุพรรณบุรี',
            'สุราษฎร์ธานี',
            'สุรินทร์',
            'หนองคาย',
            'หนองบัวลำภู',
            'อ่างทอง',
            'อำนาจเจริญ',
            'อุดรธานี',
            'อุตรดิตถ์',
            'อุทัยธานี',
            'อุบลราชธานี',
        ];

        function get_province() {
            for (let index = 0; index < province_th.length; index++) {
                const element = province_th[index];
                var option = document.createElement("option");
                option.text = element;
                option.value = element;
                var select = document.getElementById("province");
                select.appendChild(option);

            }
        }

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>


</body>

</html>