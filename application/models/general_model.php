<?php 
class General_model extends CI_Model{

	function __construct(){	
		// Call the Model constructor
        parent::__construct();	
	}
	
	
	/**********************************************************
	Function getCriteria(Where=Condition in Array Format)
	**********************************************************/
	function getCriteria($condition="",$tableName)
	{
		//print_r($condition);
		if($condition!="")
		{
			$this->db->where($condition); 
		}	
		return $this->db->get($tableName);
	}
	/**********************************************************
	Function save() for addingthe record
	**********************************************************/
    function save($tableName,$arr,$val='false')
	{
	$str=$this->db->insert_string($tableName,$arr);
	$rs=$this->db->query($str);
	if($val==true)
		return $this->db->insert_id();
	else
		return $rs;
	}
	/**********************************************************
	Function update() for editing the record
	**********************************************************/
    function update($tableName,$arr,$where)
	{
	$str = $this->db->update_string($tableName, $arr, $where);
	$rs=$this->db->query($str);
    return $rs;
	}
    /**********************************************************
	Function getSelect()n for displaying record
*********************************************************/
	function getSelect($select,$tableName,$where='',$order_type='',$order_by='')
	{
	$this->db->select($select);
	$this->db->from($tableName);
	if($where!='')
		$this->db->where($where);
	if($order_by!='')
		$this->db->orderby($order_type, $order_by);
	$query=$this->db->get();
	return $query; 
	}
	/**********************************************************
	Function delete() for deletingthe record
	**********************************************************/	
    function delete($tableName,$where)
	{
	$this->db->where($where);
	$this->db->delete($tableName);
	}
	/**********************************************************
	Function excecute() take compelet query
	**********************************************************/
    function excecute($query)
	{
	$rs=$this->db->query($query);
    return $rs;
	}

	/**********************************************************
	Function select() take full complete perms
	**********************************************************/
	function select2($select, $tableName, $where, $orderby, $paging_limit, $paging_id, $order_type, $order_by ,$groupby ='')
	{
	
	  // $query="SELECT $select from $tableName where $where order by $order_type $order_by limit $paging_id,$paging_limit ";
	   //echo $query;
	   //exit;
	  // echo "SELECT $select from $tableName where $where order by $order_by limit $paging_id,$paging_limit";
		$queryResult = $this->db->query("SELECT $select from $tableName where $where order by $order_by limit $paging_id,$paging_limit");
		//$this->db->select($select);
//		$this->db->from($tableName);
//		$this->db->where($where);
//		$this->db->orderby($order_type, $order_by);
//		$this->db->limit($paging_limit, $paging_id);
//		if (!empty ($groupby) ) $this->db->groupby( $groupby );
		//echo $this->db->query();
		//$query = $this->db->get();
		//echo $query;
		return $queryResult;
	}
	function select($select, $tableName, $where, $orderby, $paging_limit, $paging_id, $order_type, $order_by ,$groupby ='')
	{
	
	  // $query="SELECT $select from $tableName where $where order by $order_type $order_by limit $paging_id,$paging_limit ";
	   //echo $query;
	   //exit;
	$queryResult = $this->db->query("SELECT $select from $tableName where $where order by $order_type $order_by limit $paging_id,$paging_limit");
		//$this->db->select($select);
//		$this->db->from($tableName);
//		$this->db->where($where);
//		$this->db->orderby($order_type, $order_by);
//		$this->db->limit($paging_limit, $paging_id);
//		if (!empty ($groupby) ) $this->db->groupby( $groupby );
		//echo $this->db->query();
		//$query = $this->db->get();
		//echo $query;
		return $queryResult;
	}
	function select1($select, $tableName, $where)
	{
	
	  // $query="SELECT $select from $tableName where $where order by $order_type $order_by limit $paging_id,$paging_limit ";
	   //echo $query;
	   //exit;
	$queryResult = $this->db->query("SELECT $select from $tableName where $where");
		//$this->db->select($select);
//		$this->db->from($tableName);
//		$this->db->where($where);
//		$this->db->orderby($order_type, $order_by);
//		$this->db->limit($paging_limit, $paging_id);
//		if (!empty ($groupby) ) $this->db->groupby( $groupby );
		//echo $this->db->query();
		//$query = $this->db->get();
		//echo $query;
		return $queryResult;
	}
	
	/**********************************************************
	Function countQuery() take table name and select feild
	**********************************************************/

	function countQuery($table,$select, $where="")
	{
		$this->db->select($select);
        $this->db->from($table);
		if($where!="")
		{
		$this->db->where($where);
		}
		$query = $this->db->get();
			return $query->num_rows();
			//return $query->result();
	}
   /**********************************************************
	Function getCurrent get current value of the feild
	**********************************************************/
	
	function getCurrent($table='',$feild='',$where='')
	{
		//$this->db->select($feild);
		//$this->db->from($table);
		//$this->db->where($where);
		//$query = $this->db->get();
	if ($where=='')
	$query=$this->db->query("select $feild as feild from $table");
	else
	$query=$this->db->query("select $feild as feild from $table where $where");
		
		
		
		if($query->num_rows() > 0)
		{ 
			$rowP = $query->row(); 
			//print_r($rowP->Group);
			return $rowP->feild;		   
	   }
	   else
	   {
	   return false;
	   }
	}
	   /**********************************************************
	Function getCurrentArray get current value of the feild
	**********************************************************/
	
	function getCurrentArray($table='',$feild='',$where='')
	{
		$this->db->select($feild);
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{ 
			$rowP = $query->row(); 
			
			foreach($rowP as $value)
                        {

			return $value;
                        }
	   }
	   else
	   {
	        return false;
	   }
	}
	/**********************************************************
	Function getMax get currentMax value of the feild
	**********************************************************/
	function getMax($table='',$feild='',$where='')
	{
	  //echo $query="SELECT MAX($feild) as Code FROM $table where $where";
	  //echo $table;
    
if($where!="")
{	
$queryResult = $this->db->query("SELECT IFNULL(MAX($feild),0) as Code FROM $table where $where ");
}
else
{
$queryResult = $this->db->query("SELECT IFNULL(MAX($feild),0) as Code FROM $table");
}	
	if($queryResult->num_rows()>0)
		{
			$row = $queryResult->row();
			return $row->Code;
		}
		else
		{
			return 0;
		}
	
	
	}
	
	function getSum($table='',$feild='',$where='')
	{
	   if($where!="")
		{	
			$queryResult = $this->db->query("SELECT SUM($feild) as Code FROM $table where $where ");
		}
		else
		{
			$queryResult = $this->db->query("SELECT SUM($feild) as Code FROM $table");
		}	
		if($queryResult->num_rows()>0)
			{
				$row = $queryResult->row();
				return $row->Code;
			}
			else
			{
				return 0;
			}
	
	}
	
	
	
	function getDropdownValues($table='',$codeFeild='',$nameFeild='',$where='', $orderby='')
	{
		//$str="SELECT $codeFeild as code,$nameFeild as name FROM $table where $where";
		//echo $str;
		//exit;
		if($where!='' && $orderby!= '')
			$queryResult = $this->db->query("SELECT $codeFeild as code,$nameFeild as name FROM $table where $where order by $orderby");
		else if($where!='' && $orderby== '')
			$queryResult = $this->db->query("SELECT $codeFeild as code,$nameFeild as name FROM $table where $where ");
		else if($where=='' && $orderby!= '')
			$queryResult = $this->db->query("SELECT $codeFeild as code,$nameFeild as name FROM $table order by $orderby");
		else
			$queryResult = $this->db->query("SELECT $codeFeild as code,$nameFeild as name FROM $table ");

		if($queryResult->num_rows()>0)
		{
			foreach($queryResult->result() as $row)
			{
				$arrList[$row->code]=$row->name;
			}
			return $arrList;	
		}
		else
			return 0;	
	}	  
	
	function getDropdownValuesTwoKeys($table='',$parentcodeFeild='', $childcodeFeild='', $nameFeild='',$where='', $orderby='')
	{
		//$str="SELECT $codeFeild as code,$nameFeild as name FROM $table where $where";
		//echo $str;
		//exit;
		if ($where=='')
			$queryResult = $this->db->query("SELECT $parentcodeFeild as parentcode,$nameFeild as name,$childcodeFeild as childcode FROM $table ");
		else
			$queryResult = $this->db->query("SELECT $parentcodeFeild as parentcode,$nameFeild as name,$childcodeFeild as childcode FROM $table where $where ");
		if($orderby!='')
			$queryResult = $this->db->query("SELECT $parentcodeFeild as parentcode,$nameFeild as name,$childcodeFeild as childcode FROM $table where $where order by $orderby");
		if($queryResult->num_rows()>0)
		{
			foreach($queryResult->result() as $row)
			{
				$code = "".$row->parentcode."_".$row->childcode."";
				$arrList[$code]=$row->name;
			}
			return $arrList;	
		}
		else
			return 0;	
	}	  

	
	function convert_number($number) 
	{   
		$arrNum = explode(".",$number);
		//if (($number < 0) || ($number > 999999999)) 
		//{ 
		//throw new Exception("Number is out of range");
		//} 
	
		$Gn = floor($number / 1000000);  /* Millions (giga) */ 
		$number -= $Gn * 1000000; 
		$kn = floor($number / 1000);     /* Thousands (kilo) */ 
		$number -= $kn * 1000; 
		$Hn = floor($number / 100);      /* Hundreds (hecto) */ 
		$number -= $Hn * 100; 
		$Dn = floor($number / 10);       /* Tens (deca) */ 
		$n = $number % 10;               /* Ones */ 
	
		$res = ""; 
	
		if ($Gn) 
		{ 
			$res .= $this->convert_number($Gn) . " Million"; 
		} 
	
		if ($kn) 
		{ 
			$res .= (empty($res) ? "" : " ") . 
				$this->convert_number($kn) . " Thousand"; 
		} 
	
		if ($Hn) 
		{ 
			$res .= (empty($res) ? "" : " ") . 
				$this->convert_number($Hn) . " Hundred"; 
		} 
	
		$ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
			"Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
			"Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
			"Nineteen"); 
		$tens = array("", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", 
			"Seventy", "Eigthy", "Ninty"); 
	
		if ($Dn || $n) 
		{ 
			if (!empty($res)) 
			{ 
				$res .= " and "; 
			} 
	
			if ($Dn < 2) 
			{ 
				$res .= $ones[$Dn * 10 + $n]; 
			} 
			else 
			{ 
				$res .= $tens[$Dn]; 
	
				if ($n) 
				{ 
					$res .= " " . $ones[$n]; 
				} 
			} 
		} 
	
		if (empty($res)) 
		{ 
			$res = "zero"; 
		} 
			
		return $res; 
	} 
	
	function getProgramLevel($PLC)
	{
		$where = "ProgramLevelCode = ".$PLC;
		return $this->getCurrent("programlevel","ProgramLevelTitle",$where);
	}
	function getProgram($PC)
	{
		$where = "ProgramCode = ".$PC;
		return $this->getCurrent("program","ProgramTitle",$where);
		
	}
	function getCategory($CC)
	{
		$where = "CategoryCode = ".$CC;
		return $this->getCurrent("category","Category",$where);
	}

	function getSubjectName($SC)
	{
		$where = "SubjectCode = ".$SC;
		return $this->getCurrent("subject","SubjectTitle",$where);
		
	}
	function getCustomerName($FC)
	{
		$where = "id = ".$FC;
		return $this->getCurrent("customer","name",$where);
		
	}
	function getStatus($Status)
	{
		if($Status==0)
			return "In Active";
		else
			return "Active";
	}
	
	function getProgSpecial($PC,$PSC)
	{
		$where = "ProgramCode = ".$PC." AND ProgramSpecialCode = ".$PSC;
		return $this->getCurrent("programspecial","ProgramSpecialTitle",$where);
	}
	function getRMDescription($PC,$RMC)
	{
		$where = "ProgramCode = ".$PC." AND RMCode = ".$RMC;
		return $this->getCurrent("rm","Description",$where);
	}
	function getFeeVersionTitle($PC, $FVC)
	{
		$where = "ProgramCode = ".$PC." AND FeeVersionCode = ".$FVC;
		return $this->getCurrent("feeversion","FeeVersionTitle",$where);
	}
	function getYesNo($val)
	{
		if($val==1)
			return "Yes";
		else
			return "No";
	}
	function getheadname($BC)
	{
		$where = "customer_heads = ".$BC;
		return $this->getCurrent("cus_heads","Title",$where);
	}
	function getcus_name($cus_head,$cus_id)
	{
		$where = "cus_head = ".$cus_head." AND cus_id = ".$cus_id;
		return $this->getCurrent("customer","cus_name",$where);
	}
	function getCityName($CC)
	{
		$where = "CityCode = ".$CC;
		return $this->getCurrent("city","CityName",$where);
	}
	function getVerifyResut($VRID)
	{
		$where = "VerifyResultID = ".$VRID;
		return $this->getCurrent("verifyresult","VerifyResult",$where);
	}
	function getBuySellDrop($selected=0)
	{
		$str = "<select>";
		$str .= '<option '.($selected==1?'selected':'').' value="1">Buy</option>';
		$str .= '<option '.($selected==2?'selected':'').'value="2">Sell</option>';
		$str .= "</select>";	
		return $str;
	}
	function getcusdrop($selected=0)
	{
		$res = $this->getSelect("id,name","customer");

		$str = '<select name="customer_id" id="customer_id">';
		foreach($res->result() as $row)
		{
			$str .= '<option value="'.$row->id.'">'.$row->name.'</option>';	
		}
		$str .= '<select>';

		return $str;
	}
	
	function getcusheaddrop($name="",$selected=0,$extra="")
	{
		$res = $this->getSelect('customer_heads, Title',"cus_heads");
		if($name=="")
			$name = "head_code";
		$str = '<select name="'.$name.'" id="'.$name.'" '.$extra.'><option value="">All</option>';
		foreach($res->result() as $row)
		{
			$str .= '<option value="'.$row->customer_heads.'">'.$row->customer_heads." - ".$row->Title.'</option>';	
		}
		$str .= '<select>';

		return $str;
	}
	function getitemname($id)
	{
		$where = "id = ".$id;
		$res = $this->getSelect('id, size , name , shape, rate',"inventory");
		$row = $res->row();
		$shape = $this->getShapes($row->shape);
		return $row->size." - ".$row->name." - ".$shape;
	}
	function itemoptionsonly()
	{
		$res = $this->getSelect('id, size , name , shape, rate',"inventory");
		$str = "";
		foreach($res->result() as $row)
		{
			$shape = $this->getShapes($row->shape);
			$str .= '<option rel="'.$row->rate.'" value="'.$row->id.'">'.$row->size." - ".$row->name." - ".$shape.'</option>';	
		}
		return $str;
	}
	
	function getCatTypes($id = -1)
	{
		$arr = array();
		$arr[0] = "Normal";
		$arr[1] = "Main Menu Item";
		if($id==-1)
			return $arr;
		else
			return $arr[$id];
		
	}
	
	function getCatTypesDrop($selected = 0)
	{
		$res = '<select name="form_dat[type]" id="cat_type">';
		$arr = $this->getCatTypes();
		$sel = "";
		foreach($arr as $k => $v)
		{
			$sel = "";
			if($selected==$k)
				$sel = "selected";
			$res .= '<option '.$sel.' value="'.$k.'">'.$v.'</option>';
		}
		$res .= '</select>';
		return $res;
	}
	
	function getCategoryDrop($selected = 0)
	{
		$res = '<select name="form_dat[parent_id]" id="parent_cat_name">';
		$dat = $this->getSelect("cat_id,cat_name","category","","cat_name");
		$sel = "";
		$res .='<option value="0"> - No Parent - </option>';
		foreach($dat->result() as $v)
		{
			$sel = "";
			if($selected==$v->cat_id)
				$sel = "selected";
			$res .= '<option '.$sel.' value="'.$v->cat_id.'">'.$v->cat_name.'</option>';
		}
		$res .= '</select>';
		return $res;
	}
	function getCategoryDropItems($selected = 0)
	{
		$res = '<select name="form_dat[category_id]" id="cat_name">';
		$dat = $this->getSelect("cat_id,cat_name","category","","cat_name");
		$sel = "";
		$res .='<option value="0"> - </option>';
		foreach($dat->result() as $v)
		{
			$sel = "";
			if($selected==$v->cat_id)
				$sel = "selected";
			$res .= '<option '.$sel.' value="'.$v->cat_id.'">'.$v->cat_name.'</option>';
		}
		$res .= '</select>';
		return $res;
	}
	function getCurrType()
	{
		return "PKR";
	}
		 /**********************************************************
	Function getSelectSubmenu()n for displaying record
	*********************************************************/
	function getSelectSubmenu($select,$tableName,$where='',$order_type='',$order_by='')
	{
	$this->db->select($select);
	$this->db->from($tableName);
	if($where!='')
		$this->db->where($where);
	if($order_by!='')
		$this->db->order_by($order_type, $order_by);
     $query=$this->db->get();
	 $rec = $query->result_array();	 
	  
	   if(count($rec)>0)
	   {
		   return $rec;
		  
	   }//if ends here
		  
	
	}
	function getItemsCount($qty=0)
	{
		$str = "";
		for($loop=0;$loop<=12;$loop++)
		{
			//if($loop==0)
				$str .= "<span>".$loop."</span>";
			//else
				//$str .= "<span style='margin-top:-".(33*$qty)."px'>".$loop."</span>";
		}
		return $str;
	}
	function parse_cat_url_name($cat_name="")
	{

		return strtolower(str_replace(" ","-",str_replace("&","~",$cat_name)));
	}
	
	function selectRecord($col,$from,$where="",$orderby="",$limit="",$wherearray)
	{
		//echo "fdfd".$limit;
		$query=" SELECT ".$col." FROM ".$from;
		$query.=$where!=""?" WHERE ".$where:"";
		$query.=$orderby!=""?" ORDER BY ".$orderby:"";
		$query.=$limit!=""?" LIMIT ".$limit:"";
		
		$data=$this->db->query($query,$wherearray);
		//echo $query.'<br/>';
		//print_r($wherearray);
		return $data;
	}
	
	// fundtion to deactiate values
	
	function deactiveteEntry($tablename,$condition)
	{
		$query=" UPDATE ".$tablename. " SET ".$tablename."_status=0 WHERE ".$condition;
		//echo $query;
		return $this->db->query($query);
	}
	// fundtion to activate values
	
	function activeteEntry($tablename,$condition)
	{
		$query=" UPDATE ".$tablename. " SET ".$tablename."_status=1 WHERE ".$condition;
		//echo $query;
		return $this->db->query($query);
	}
}
?>