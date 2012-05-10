<?	
defined('_JEXEC') or die(); ?>
<table cellspacing="0" cellpadding="10">
<? foreach($this->list as $l):?>
  <tr>
    <td>&nbsp;</td>
    <td><a href="<? echo $l->link;?>"><? echo $l->message;?></a></td>
  </tr>
<?	endforeach;?>
</table>
