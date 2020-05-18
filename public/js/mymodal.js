
                    
                    
            var mymodal = document.getElementById("myModal");
                var btn = document.getElementById("reset-modal");
                    var mymodalview = document.getElementById("myModalview");
                if( btn ){                    
                    btn.onclick = function() {
                        window.alert("modal exist. Todo reset user score.");                    
                        $('#myModalview').addClass('modalhidden');
                    console.log('button pressed');
                    }
                }
         

