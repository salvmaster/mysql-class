<?
error_reporting(0);
ini_set("display_errors", 0 );
$host = "";
$database = "";
$user = "";
$pass = "";
$conexao = mysql_connect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
$db=mysql_select_db($database, $conexao);

/**
 * CLASSE MYSQLiClass
 * 
 * criada por Fernando Salviano para realizar operações no banco de dados mysql
 * 
 * PHP Version 5
 * 
 * @category MYSQLiClass
 * @package  MYSQLiClass
 * @author   Fernando Salviano <contato@salvmaster.com.br>
 * @license  GNU GENERAL PUBLIC LICENSE
 * @link     http://www.salvmaster.com.br
 * 
 */
class MYSQLiClass{
    /**
   *Declarações de propriedades
   */ 
    /**
	*Nome da Tabela MYSQL
	*/
    protected $tabela;

    /**
	*Nome do Campo + pesquisa MYSQL "ex. id>0" a ser consultado 
	*/
    protected $campo;

    /**
	*Resultado MYSQL
	*/  
    protected $resultado;  

    /**
	*Variavel responsavel pela conexao e SELECT
	*/  
    public $res;

    /**
	*Linha com retorno de informações da tabela MYSQL
	*/  
    public $row;

    /**
    * responsavel por pesquisar um unico item no banco de dados
    *@return string
    */
    public function selectUN($tabela,$campo){
        $res = mysql_query("SELECT * FROM $tabela WHERE $campo")or die(mysql_error());
        $row = mysql_fetch_array($res);
        return $row;
    }

    /**
    * responsavel por pesquisar quando precisar pegar varios itens
    *@return string
    */
    public function selectALL($tabela,$campo){
        $res = mysql_query("SELECT * FROM $tabela WHERE $campo")or die(mysql_error());
        return $res;
    }

    /**
    * SOMAR Campo de Tabela
    *@return string
    */
    public function totalCampo($tabela,$campo,$resultado){
        $res = mysql_query("SELECT * FROM $tabela WHERE $campo")or die(mysql_error());
        while($row = mysql_fetch_array($res)){
            $total += $row[$resultado];
        }
        return $total;
    }

    /**
    * INSERT
    * @return void
    */
    public final function insert($tabela,$campos,$valores){
        $res = mysql_query("INSERT INTO $tabela ($campos)VALUES($valores)");
    }

    /**
    * UPDATE
    * @return void
    */
    public final function update($tabela,$campos,$where){
        $res = mysql_query("UPDATE $tabela SET $campos WHERE $where ");
    }

    /**
    *APAGAR registro de tabela
    *@return void
    */
    public function delete($tabela,$campo){
        $res = mysql_query("DELETE  FROM $tabela WHERE $campo");
    }

}
?>