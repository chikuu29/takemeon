
var search_result=document.getElementById('search-item');


function get_search_result(str) {
    
  
    if (str=="") {
        search_result.style.display="none";
       
        document.getElementById('search_btn').innerHTML='<i class="fas fa-search"></i>';

    }else{
        document.getElementById('search_btn').innerHTML='<i class="fas fa-times"></i>';
        findsearchiem(str);
    }
   
    
  
}

function findsearchiem(input_value) {
    search_result.style.display="block";
    $(document).ready(function(){
        $.ajax({
            url:'php/fetch_search_result.php',
            type:'POST',
            data:{q:input_value},
            success:function(data){

                $('#searh_holder').html(data);
                // console.log(data)


            }
        })
        


    })

    var input, filter, ul, li, a, i;

    // input = document.getElementById("mySearch");
    filter = input_value.toUpperCase();
    console.log(filter);
    ul = document.getElementById("searh_holder");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            
            li[i].style.display = "";
          
            
        } else {
            li[i].style.display = "none";
        }
    }
   
}


