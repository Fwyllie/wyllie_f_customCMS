var button = document.querySelector('.openFilter');
var filter = document.querySelector('.filterNav');
var clear = document.querySelector('#clear');

function toggleFilter(){
  if(filter.style.display === "block") {
    filter.style.display = "none";
    clear.style.display = "none";
    button.innerHTML = "Filter";
  }else{
    filter.style.display = "block";
    clear.style.display = "block";
    button.innerHTML = "X";
  }
}


button.addEventListener("click", toggleFilter);
