<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .thankyou{
            width: 40%;
            margin:150px auto 150px auto;
            
        }
        .thankyou-form{
            width: 100%;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            border: 1px solid #d9d9d9;
            border-radius: 10px;
            text-align: center;
            justify-content: center;
        }
        .thankyou-img{
            width: 230px;
            height: 150px;
            margin: auto;
            overflow: hidden;
            background-size: contain;
            border: 1px solid #d9d9d9;
            border-radius: 10px;
        }
        .thankyou-img > img{
            width: 100%;
            height: 100%;
        }
        .thankyou-text{
            display: flex;
            flex-direction: column;
            font-size: 19px;
            color: rgba(240,67,70);
            margin-top: 10px;
        }
        .thankyou-text span:last-child{
            color: rgba(144,0,0);
            margin-top: 3px;
            font-size: 24px;
            font-weight: 700;
        }
        .thankyou-btn{
            cursor: pointer;
            margin: 15px auto 10px auto;
            width: 40%;
            height: 50px;
            text-align: center;
            background-color: #6666FF;
            border: 1px solid #d9d9d9;
            border-radius: 5px;
        }
        .thankyou-btn > a{
            line-height: 50px;
            width: 100%;
            font-size: 18px;
            color: #fff;
        }
        .thankyou-btn:hover{
            background-color: #fff;
            border: 1px solid #6666FF;
        }
        .thankyou-btn:hover a{
            color: #6666FF;
        }


    </style>
</head>
<body>
    <section class="thankyou">
        <div class="thankyou-form">
            <div class="thankyou-img">
                <img src="../admin/assets/img/giphy.gif">
            </div>
            <div class="thankyou-text">
                <span>Cảm ơn bạn đã đặt hàng tại</span>
                <span>D&N FASHION</span>
            </div>
            <div class="thankyou-btn">
                <a href="index.php">Xác nhận</a>
            </div>
        </div>
    </section>
</body>
</html>