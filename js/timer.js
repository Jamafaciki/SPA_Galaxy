    function timer(){   
        $.ajax({   
            url: "src/actions/timer.php",   
            cache: false,   
            success: function(html){   
                $("#content").html(html);   
            }   
        });   
    }     
    $(document).ready(function(){
        timer();   
        setInterval('timer()',1000);   
    });   