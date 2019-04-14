<script>
    function showInput(type){
        if(type.value == 'Income'){
            // Disable expenses select
            document.getElementById('Expenses').getElementsByClassName('form-control')[0].disabled = true;
            document.getElementById('Income').getElementsByClassName('form-control')[0].disabled = false;

            // Show income div
            document.getElementById('Expenses').style.display = 'none';
            document.getElementById('Income').style.display = 'block';
        }else if(type.value == 'Expenses'){
            // Disable income select
            document.getElementById('Expenses').getElementsByClassName('form-control')[0].disabled = false;
            document.getElementById('Income').getElementsByClassName('form-control')[0].disabled = true;

            // Show expenses div
            document.getElementById('Expenses').style.display = 'block';
            document.getElementById('Income').style.display = 'none';
        }
    }
</script>