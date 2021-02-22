    $(document).ready(function() {
        $("#encrypt").click(function() {
          var cc = new Moip.CreditCard({
            number  : "6362970000457013",
            cvc     : "123",
            expMonth: "06",
            expYear : "22",
            pubKey  : "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxpOmJqPM2yy1zWThxIET LHVtzisa9gIp79haetRWkjPb8yaFDMB8P7ndJUYYoV/CHBiemZjScMcGzdhACeEpbI7j06Jo+KaQVhpwALPYm3fC40KSyHtTjXC0O/s30J7PlRC+ZBv23CO8pqvqzdtmJicJtSPt+hxt/bEbZq0COyUC8b1wxozJnLnmyKwM10QuRibR9jMEGh/cKEAvHFd0AtJgJgpf8z8sVqHctySoaxPqRqu6GraBjcx7DecajFr5wQ+248IadQWiPJAShKgcda+xeWns+THZbxKZRTnHSTEPU8jVKS9/GMIrhBt2xLQNsGi+G9zFIuMpfwdKqeV9TwIDAQAB"
          });
          console.log(cc);
          if( cc.isValid()){
            $("#encrypted_value").val(cc.hash());
            console.log(cc.hash());
          }
          else{
            $("#encrypted_value").val('');
            alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
          }
        });
    });
