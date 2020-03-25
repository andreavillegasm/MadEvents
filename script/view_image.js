window.onload = function () {
    var image = document.getElementsByName('image');
    var div = document.getElementById('container');

    for(let $i=0;$i<image.length;$i++){
            // console.log($i);
        image[$i].onclick = function(){
            //console.log(this.src);
            //this.style.width = "700px";
            this.classList.toggle('popup');
        }

    }

}