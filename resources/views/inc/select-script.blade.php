<script>
    function showInput(type){
        if(type.value == 'Income'){
            document.getElementById('Expenses').style.display = 'none';
            document.getElementById('Income').style.display = 'block';
        }else if(type.value == 'Expenses'){
            document.getElementById('Expenses').style.display = 'block';
            document.getElementById('Income').style.display = 'none';
        }
    }
</script>