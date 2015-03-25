<?php
function ostan($ids = null)
{
  $class = 'class="multi-select"';
  $CI = get_instance();
   
  $CI->db->select('ostan,ostan_id');
  $CI->db->group_by("ostan");
  $query = $CI->db->get('bf_city');

  $select = null;
  $ostan = '<select multiple="multiple" name="state[]" runat="server" id="state" '. $class .'>';
  if($query->result())
  {
    $i = 0;
    foreach ($query->result() as $row) {
      if($ids != null)
      {

      		if(is_array($ids))
      		{
      			foreach ($ids as $id) {
      				
      				if($row->ostan_id == $id){
						$select = 'selected="selected"';
			        }
      			}
      			
      		}
          
      }
      if($i == 0)
      {
        $ostan .= '<option value="0">همه استان ها</option>';  
      }
      else{
        $ostan .= '<option ' . $select .' value="' . $row->ostan_id . '">' . $row->ostan . '</option>';
      }
      $i++;
      $select = null;
    }
  }
  $ostan .= '</select>';
  echo $ostan;
}