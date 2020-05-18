
                    
                    
            var mymodal = document.getElementById("myModal");
                var btn = document.getElementById("reset-modal");
                    var mymodalview = document.getElementById("myModalview");
                if( btn ){                    
                    btn.onclick = function() {
                        
                        $('#myModalview').addClass('modalhidden');
                    console.log('button pressed');
                    var resultSession = resetUserQuiz(1);
                    window.alert("modal exist. Rreset user score done.");  

                }
            }

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            function resetUserQuiz(quiz) {
                var quiz = { quiz : quiz };
                console.log("js resetUserQuiz called");
                $.ajax({
                  type: "POST",
                  url: '/topics/play/resetUserQuiz',
                  data: quiz,
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(data) {
                    location.reload();
                    console.log("Value reset=");
                    console.log(data.quiz);
                  }
                })
            };
                

