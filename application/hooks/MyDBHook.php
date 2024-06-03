class MyDBHook {
public function disableOnlyFullGroupBy() {
$CI =& get_instance();
$CI->db->query("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
}
}