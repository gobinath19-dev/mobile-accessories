
        function validateForm() {
        
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            let isValid = true;

            // Validate email format
            
            // Validate password and confirm password match
            if (password !== confirmPassword) {
                document.getElementById("passwordError").textContent = "";
                document.getElementById("confirmPasswordError").textContent = "Password do not match!";
                isValid = false;
            } else {
                document.getElementById("passwordError").textContent = "";
                document.getElementById("confirmPasswordError").textContent = "";
            }

            return isValid;
        }
