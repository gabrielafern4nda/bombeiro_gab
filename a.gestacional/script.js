document.getElementById('opcao1').addEventListener('change', function() {
    document.getElementById('opcao1-adicional').style.display = this.checked ? 'block' : 'none';
  });

  document.getElementById('opcao2_nao').addEventListener('change', function() {
    document.getElementById('opcao2-adicional').style.display = this.checked ? 'block' : 'none';
  });
  