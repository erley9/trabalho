<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Combo {
    protected $ci;
    public function __construct()
    {
        $this->ci= & get_instance();
        $this->ci->load->model("geral/categoria_model");
        $this->ci->load->model("geral/subcategoria_model");
        
    }

    public function montaComboCategoria(){
        
        $busca = $this->ci->categoria_model->get_all();
        

        $combo="<select name='categorias' id='categorias' data-url='".base_url()."'>";
        $combo.="<option value=''>Selecione uma Categoria</option>";

        foreach ($busca->result() as $linha) {
            $combo.="<option value='{$linha->id}'>{$linha->categoria}</option>";
        }

        $combo.="</select>";

        return $combo;
    }


    public function montaComboSubcategoria($categoria){
        
        $busca = $this->ci->subcategoria_model->buscaPorCategoria($categoria);
        

        $combo="<select name='subcategorias' id='subcategorias' data-url='".base_url()."'>";
        $combo.="<option value=''>Selecione uma Subcategoria</option>";

        foreach ($busca->result() as $linha) {
            $combo.="<option value='{$linha->id}'>{$linha->nome}</option>";
        }

        $combo.="</select>";

        return $combo;
    }

    public function montaComboSubcategoria2($categoria){

        $busca = $this->ci->subcategoria_model->buscaPorCategoria($categoria);

        $combo = "<option value=''>Selecione a Subcategoria</option>";

        foreach ($busca->result() as $linha) {
            $combo.="<option value='{$linha->id}'>{$linha->nome}</option>";
        }

        return $combo;

    }

    public function montaComboCategoriaSelecionado($id){
        
        $busca = $this->ci->categoria_model->get_all();
        

        $combo="<select name='categorias' id='categorias'>";
        $combo.="<option value=''>Selecione uma Categoria</option>";

        foreach ($busca->result() as $linha) {
            if($linha->id == $id){
            $combo.="<option value='{$linha->id}'selected>{$linha->categoria}</option>";
            }else{
             $combo.="<option value='{$linha->id}'>{$linha->categoria}</option>";    
            }
        }

        $combo.="</select>";

        return $combo;
    }



    public function montaComboEmpresaSelecionado($status){


        $combo="<select name='status' id='status'>";
        $combo.="<option value=''>Selecione o  Status</option>";

        if($status=="ativo"){
             $combo.= "<option value='ativo' selected>Ativo</option>";
        }else{
             $combo.= "<option value='ativo'>Ativo</option>";
        }

        if($status=="desativado"){
             $combo.= "<option value='desativado' selected>Desativado</option>";
        }else{
             $combo.= "<option value='desativado'>Desativo</option>";
        }

        $combo.="</select>";

        return $combo;
    }

}

?>