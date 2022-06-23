<?
if ( ! function_exists('get_router')) {
    function get_router() {

        static $data = null;
        if (is_null($data)) {
            $CI =& get_instance();

            /////#####===== 시스템 정보 =====#####/////
            $data["fetch_directory"] = $CI->router->directory;
            $data["fetch_class"] = $CI->router->class;
            $data["fetch_method"] = $CI->router->method;
            $data["fetch_views"] = VIEWPATH . $data["fetch_directory"] . $data["fetch_class"] . "/" . $data["fetch_method"] . ".php";

            return $data;
        }
    }
}

?>