 
    const header = document.querySelector("header")
    window.addEventListener("scroll",function(){
        x = window.pageXOffset
        if(x>0){
            header.classList.add("sticky")
        }
        else{
            header.classList.remove("sticky")
        }
    })

    let list = document.querySelector('.slider-list');
    let items = document.querySelectorAll('.list-item');
    let dots = document.querySelectorAll('.slider-dot li');
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');

    let active = 0
    let lengthItems = items.length - 1;

    next.onclick = function(){
        if(active + 1 > lengthItems){
            active = 0;
        }
        else{
            active += 1;
        }
        reloadSlider();
    }
    prev.onclick = function(){
        if(active - 1 < 0){
            active = lengthItems;
        }
        else{
            active = active - 1;
        }
        reloadSlider();
    }
    let refreshSlider = setInterval(() => {next.click()},5000)
    function reloadSlider(){
        let checkLeft = items[active].offsetLeft;
        list.style.left = -checkLeft + 'px';

        let lastActiveDot = document.querySelector('.slider-dot li.dot-active');
        lastActiveDot.classList.remove('dot-active');
        dots[active].classList.add('dot-active');
        clearInterval(refreshSlider);
        refreshSlider = setInterval(() => {next.click()},5000);
    }

    dots.forEach((li, key) => {
        li.addEventListener('click', function(){
            active = key;
            reloadSlider();
        })
    })
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer =document.querySelector(".aspect-ratio-169")
    const doiItem = document.querySelectorAll(".dot")
    let imgnumber = imgPosition.length
    let index = 0
    imgPosition.forEach(function(image, index){
        image.style.left = index*100 + "%"
        doiItem[index].addEventListener("click",function(){
            slider(index)
        })
    })

    function imgSlide(){
        index++;
        if(index>=imgnumber) {index=0}
        slider(index)
        imgContainer.style.left = "-" +index*100+ "%"
    }
    function slider(index){
        imgContainer.style.left = "-" +index*100+ "%"
        const dotActive = document.querySelector(".active")
        dotActive. classList.remove("active")
        doiItem[index]. classList.add("active")
    }

  setInterval(imgSlide,5000)
  //----------------------Menu-Slidebar-cartegory//
  const itemslidebar = document.querySelectorAll(".cartegory-left-li")
    itemslidebar.forEach(function(menu,index){
        menu.addEventListener("click",function(){
            menu.classList.toggle("block")
        })
    })
      //--------Product--------//
      const butTon = document.querySelector(".product-content-right-bottom-top")
      if(butTon){
         butTon.addEventListener("click",function(){
             document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
         })
      }
      const bigImg = document.querySelector(".product-img__big img")
      const smallImg = document.querySelectorAll(" .product-img__item img")
     smallImg.forEach(function(imgItem,X){
         imgItem.addEventListener("click",function(){
             bigImg.src = imgItem.src
         });
     });
 
     let amountElement = document.getElementById('amount')
         let amount = amountElement.value
 
         let render = (amount) =>{
             amountElement.value = amount
         }
         // Handle Plus
         let handlePlus = () =>{
             amount++
             render(amount);
         }
         // Handle Minus
         let handleMinus = () =>{
             if(amount > 1)
                 amount--;
             render(amount);
         }
 
         amountElement.addEventListener('input' , () =>{
             amount = amountElement.value;
             amount = parseInt(amount);
             amount = (isNaN(amount) || amount==0 )?1:amount;
             render(amount);
 
         });
 
         // text
         const gioiThieu = document.querySelector(".intro");
         const chiTiet = document.querySelector(".detail");
         const baoQuan = document.querySelector(".preserve");
 
         if(gioiThieu){
             gioiThieu.addEventListener("click", function(){
                 document.querySelector(".preserve-show").style.display = "none";
                 document.querySelector(".intro-show").style.display = "block";
             })
         }
         if(baoQuan){
             baoQuan.addEventListener("click", function(){
                 document.querySelector(".intro-show").style.display = "none";
                 document.querySelector(".preserve-show").style.display = "block";
             })
         }
 
         // zoom
         const Zoom = document.querySelector(".show-more");
         if(Zoom){
             Zoom.addEventListener("click",function(){
                 document.querySelector(".hidden-intro").classList.toggle("activeB")
             })
         }
         const Zoom2 = document.querySelector(".show-more");
         if(Zoom2){
             Zoom.addEventListener("click",function(){
                 document.querySelector(".hidden-preserve").classList.toggle("activeC")
             })
         }
         const arrow_down = document.querySelector(".arrow-down");
         if(arrow_down){
             arrow_down.addEventListener("click", function(){
                 document.querySelector(".arrow-up").style.display = "block";
                 document.querySelector(".arrow-down").style.display = "none";
             })
         }
         const arrow_up = document.querySelector(".arrow-up");
         if(arrow_up){
             arrow_up.addEventListener("click", function(){
                 document.querySelector(".arrow-down").style.display = "block";
                 document.querySelector(".arrow-up").style.display = "none";
             })
         }
    
    

