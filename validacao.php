<script>
    $(document).ready(function() {
        $('#formulario').bootstrapValidator({
            fields: {
                nome: {
                    validators: {
                        notEmpty: {
                            message: 'O nome é obrigatório'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'O e-mail é obrigatório'
                        },
                        emailAddress: {
                            message: 'Digite um endereço de e-mail válido'
                        }
                    }
                },
                telefone: {
                    validators: {
                        notEmpty: {
                            message: 'O telefone é obrigatório'
                        }
                    }
                },
                cep: {
                    validators: {
                        notEmpty: {
                            message: 'O cep é obrigatório'
                        }
                    }
                },
                uf: {
                    validators: {
                        notEmpty: {
                            message: 'O estado é obrigatório'
                        }
                    }
                },
                cidade: {
                    validators: {
                        notEmpty: {
                            message: 'A cidade é obrigatório'
                        }
                    }
                },
                bairro: {
                    validators: {
                        notEmpty: {
                            message: 'O bairro é obrigatório'
                        }
                    }
                },
                endereco: {
                    validators: {
                        notEmpty: {
                            message: 'O logradouro é obrigatório'
                        }
                    }
                },
                tipo_revistinha: {
                    validators: {
                        notEmpty: {
                            message: 'O tipo revistinha é obrigatório'
                        }
                    }
                },
                quantidade: {
                    validators: {
                        notEmpty: {
                            message: 'A quantidade é obrigatório'
                        }
                    }
                }
            }
        });

        $('#telefone').inputmask("(99) 99999-9999", { clearMaskOnLostFocus: false });
        $('#cep').inputmask("99999-999", { clearMaskOnLostFocus: false });
    });
</script>
