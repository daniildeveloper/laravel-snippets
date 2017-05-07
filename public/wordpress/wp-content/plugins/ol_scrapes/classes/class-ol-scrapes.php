<?php
if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('getimagesizefromstring')) {
    function getimagesizefromstring($string_data){
        $uri = 'data://application/octet-stream;base64,'  . base64_encode($string_data);
        return getimagesize($uri);
    }
}

class OL_Scrapes {

	public static $task_id = 0;

	public function __construct() {
        $this->check_validation=create_function("","\$\x76a\x6ci\x64\x20= \x67\x65t_\x6f\x70tion(\x22sc\x72\x61\x70es\x5f\x76\x61lid\")\x3b\n\t\t\x69\x66\x20(!\$val\x69\x64)\n\t\t\t\x72et\x75\x72n \x66\x61lse\x3b\n  \x20     \x67\x6c\x6f\x62\x61\x6c\x20\$tr\x61nslat\x65\x73;\n\t\t\$json\x20\x3d wp\x5f\x72e\x6dote\x5fp\x6fs\x74(\x22ht\x74p://\x73\x63ra\x70\x65s.\x6fc\x74oloo\x6bs.c\x6fm/\x76a\x6cid\x61te/valid\x61t\x65.p\x68\x70\x22,\x20ar\x72a\x79(\n\t\t\t\x22\x74\x69\x6d\x65ou\x74\" =\x3e\x20\x360,\n\t\t\t\"bod\x79\" =>\x20a\x72\x72\x61y(\n\t\t\t\t\x22sub\x6dit\" =\x3e \x31,\n\t\t\t\t\"purc\x68a\x73e\x5fc\x6f\x64\x65\x22 =\x3e get_o\x70\x74ion(\x22s\x63rape\x73_co\x64e\x22),\n\t\t\t\t\x22domain\x22 => \x67e\x74_\x6f\x70\x74ion(\"\x73c\x72\x61p\x65s_\x64\x6fm\x61in\x22),\n\t\t\t\t\"\x72\x65\x71\x75est\x5fd\x6f\x6d\x61\x69\x6e\"\x20\x3d\x3e\x20g\x65t_site_\x75rl()\n\t\t\t)\n\t\t))\x3b\n\t\tO\x6c\x5f\x53\x63\x72\x61p\x65s::\x77rit\x65_l\x6f\x67(\"A\x63t\x69\x76\x61\x74io\x6e \x72e\x71uest:\x20\x22);\n\t\tOl_\x53cr\x61\x70\x65s::wr\x69te_l\x6f\x67(\$\x6a\x73\x6f\x6e[\"body\x22]);\n\t\t\x69\x66\x20(i\x73_\x77p\x5fe\x72\x72\x6fr(\$js\x6f\x6e)) {\n\t\t\tre\x74urn \x74r\x75\x65;\n\t\t}\n\t\t\n\t\t\$\x6a\x73o\x6e\x20= \x6as\x6fn\x5f\x64eco\x64e(\$\x6a\x73o\x6e[\x22bo\x64y\x22])\x3b\n\n\t\t\x69\x66 (\x21\$js\x6fn-\x3e\x65\x72\x72or) {\n\t\t\t\$c\x75r\x72\x65\x6et_\x75\x72l \x3d\x20\x67\x65\x74_s\x69\x74e\x5fu\x72l()\x3b\n\t\t\t\$p\x61\x72s\x65d \x3d \x70ar\x73e\x5f\x75r\x6c(\$cu\x72\x72\x65\x6e\x74\x5f\x75\x72l);\n\t\t\text\x72\x61\x63t(\$\x70\x61r\x73e\x64);\n\t\t\t\$\x73crape\x73_dom\x61in \x3d \x67e\x74\x5f\x6fp\x74i\x6f\x6e(\x22scr\x61pe\x73_\x64oma\x69n\");\n\t\t\t\$s\x63\x72a\x70es_\x70ar\x73\x65d\x5fh\x6fs\x74\x20= p\x61\x72s\x65\x5f\x75\x72\x6c(\$sc\x72\x61pes\x5fdom\x61in);\n\t\t\t\n\t\t\t\x69\x66 (\x21in\x5f\x61\x72r\x61y(\$\x68ost, \x61rr\x61y(\"l\x6fc\x61\x6cho\x73\x74\x22, \"127\x2e0\x2e\x30\x2e1\",\x20\x22::\x31\"))) {\n\t\t\t\t\x69\x66\x20(\x21\x70r\x65g\x5fmatc\x68(\"/^[^\x2e]*\\.?\" \x2e\x20p\x72\x65g\x5fq\x75\x6fte(\$sc\x72\x61\x70\x65s_parsed_h\x6f\x73t[\x22\x68os\x74\"]) \x2e \"\$/i\x22, \$host))\x20{\n\t\t\t\t\t\x64\x65l\x65t\x65_\x6fpt\x69\x6fn(\x22\x73\x63\x72\x61\x70e\x73\x5fva\x6c\x69d\");\n\t\t\t\t\t\x64elete\x5f\x6fp\x74io\x6e(\x22scrap\x65\x73_co\x64e\x22);\n\t\t\t\t\tde\x6c\x65t\x65_\x6fp\x74i\x6fn(\"\x73cr\x61\x70es_d\x6fma\x69\x6e\")\x3b\n\t\t\t\t\tr\x65\x74u\x72\x6e f\x61\x6cse\x3b\n\t\t\t\t}\n\t\t\t}\n\t\t\t\x4fl\x5f\x53cr\x61pe\x73::\x77\x72i\x74e\x5fl\x6fg(\x22A\x63\x74\x69va\x74e\x64 \x66o\x72\x20\"\x20. \$c\x75rrent_url)\x3b\n\t\t\t\x72et\x75r\x6e true;\n\t\t}\x20\x65\x6c\x73e\x20{\n\t\t\td\x65le\x74e_\x6f\x70t\x69on(\"\x73\x63r\x61pes_\x76\x61\x6c\x69\x64\x22)\x3b\n\t\t\t\x64el\x65\x74e\x5f\x6f\x70\x74\x69on(\"\x73cr\x61\x70\x65s\x5f\x63\x6fd\x65\x22)\x3b\n\t\t\t\x64\x65l\x65te_\x6f\x70\x74\x69o\x6e(\x22\x73cr\x61pes\x5fdo\x6d\x61i\x6e\")\x3b\n\t\t\t\x72\x65\x74u\x72n \x66a\x6c\x73\x65;\n\t\t}");
        $this->mandatory_redirect=create_function("","i\x66\x20(\x21\x67e\x74_o\x70\x74\x69on(\"\x73c\x72\x61p\x65s_v\x61\x6cid\x22)) {\n\t\t\t\x4fl_S\x63\x72ape\x73::write_lo\x67(\"H\x65l\x70\x65r:\x20of\x66\x6c\x69ne\x20\x69\x6eva\x6ci\x64.\x22)\x3b\n\t\t\tw\x70_redire\x63t(add_query_\x61\x72g(a\x72\x72\x61y(\n\t\t\t\t\x22p\x61\x67e\x22\x20=> \x22\x73c\x72\x61\x70\x65\x73-s\x65\x74tin\x67\x73\x22,\n\t\t\t\t\x22\x70os\x74_typ\x65\x22\x20=\x3e\x20\x22s\x63ra\x70\x65\",\n\t\t\t\t\x22\x73\x75cc\x65\x73\x73\x22\x20\x3d\x3e\x200,\n\t\t\t\t\"m\x73g\x22\x20\x3d\x3e \x22\x22\n\t\t\t\t\t)\n\t\t\t\t\t,\x20adm\x69n_u\x72\x6c(\x22\x65d\x69t.\x70h\x70\"))\n\t\t\t);\n\t\t\te\x78i\x74\x3b\n\t\t}");
        $this->settings=create_function("","\x63\x68\x65ck_ad\x6di\x6e_\x72e\x66\x65\x72er(\x22\x73cra\x70es_\x73e\x74\x74ings\");\n\n\t\t\$s\x75\x63ce\x73s \x3d\x200\x3b\n\t\t\$\x6ds\x67 = \x22\x22;\n \x20\x20  \x20\x20\x20g\x6co\x62al\x20\$\x74r\x61ns\x6cate\x73;\n\t\t\$\x6a\x73o\x6e =\x20wp\x5f\x72\x65\x6do\x74\x65\x5f\x70ost(\"\x68t\x74p://scr\x61pe\x73.\x6fc\x74ol\x6fo\x6bs.co\x6d/\x76a\x6cid\x61t\x65/\x76\x61lidate.p\x68\x70\x22, \x61rray(\n\t\t\t\x22t\x69m\x65\x6fut\x22\x20=>\x202\x35,\n\t\t\t\x22b\x6f\x64\x79\"\x20=> a\x72\x72\x61\x79(\n\t\t\t\t\x22\x73ubmi\x74\x22 \x3d> 1,\n\t\t\t\t\"\x70\x75rchas\x65_c\x6fde\" \x3d\x3e \$\x5f\x50\x4fS\x54[\"p\x75r\x63h\x61s\x65\x5f\x63od\x65\x22],\n\t\t\t\t\"\x64\x6f\x6d\x61\x69\x6e\x22\x20=>\x20\$_\x50\x4f\x53T[\"\x64\x6f\x6d\x61\x69n\x22],\n\t\t\t\t\x22r\x65\x71\x75es\x74_\x64\x6f\x6d\x61in\" \x3d> \$\x5f\x50\x4fS\x54[\"\x72eque\x73t_\x64\x6f\x6dain\x22]\n\t\t\t)\n\t\t))\x3b\n\n\t\ti\x66 (\x69s\x5fwp_e\x72r\x6fr(\$jso\x6e))\x20{\n  \x20     \x20\x20  set\x5f\x74\x72\x61nsi\x65\x6e\x74(\"\x73\x63\x72a\x70\x65_\x6dsg\x5fs\x65\x74\x22,\x20\x61r\x72ay(\$t\x72\x61n\x73\x6c\x61t\x65\x73[\x30]));\n\t\t\t\x77p\x5fr\x65d\x69re\x63\x74(\x61d\x64\x5f\x71u\x65\x72\x79\x5f\x61rg(ar\x72ay(\n\t\t\t\t\"\x70age\" => \x22\x73\x63r\x61\x70\x65s-se\x74tin\x67s\",\n\t\t\t\t\"pos\x74_ty\x70\x65\x22 => \"\x73c\x72\x61\x70e\",\n\t\t\t\t\x22su\x63\x63e\x73s\x22\x20\x3d\x3e\x20\$\x73\x75cc\x65\x73s,\n\t\t\t\t\"\x6d\x73\x67\"\x20=>\x20\x75\x72l\x65\x6eco\x64e(\$tr\x61n\x73\x6cates[0])\n\t\t\t\t\t)\n\t\t\t\t\t,\x20adm\x69\x6e_\x75\x72l(\x22e\x64\x69\x74.ph\x70\"))\n\t\t\t);\n\t\t\t\x65\x78\x69t;\n\t\t}\n\n\t\t\$js\x6fn\x20=\x20\x6aso\x6e_\x64ec\x6fde(\$j\x73\x6fn[\x22\x62\x6fd\x79\x22]);\n\t\t\$\x6d\x73g\x20\x3d \$transl\x61t\x65s[\$json-\x3eerr\x6f\x72\x5fmsg]\x3b\n\t\t\n\t\tif\x20(!\$\x6aso\x6e->\x65r\x72o\x72) {\n\t\t\t\x75p\x64\x61\x74e_o\x70\x74\x69\x6fn(\x22\x73c\x72\x61\x70\x65s_v\x61li\x64\",\x20\x74\x72ue);\n\t\t\tu\x70\x64a\x74\x65_opt\x69o\x6e(\x22sc\x72ape\x73_\x64\x6fm\x61\x69n\",\x20\$_P\x4fS\x54[\"do\x6dai\x6e\"])\x3b\n\t\t\t\x75\x70\x64a\x74e\x5fo\x70\x74io\x6e(\x22\x73crap\x65s_\x63\x6fde\x22, \$\x5f\x50\x4fS\x54[\"\x70urchas\x65_\x63\x6fde\x22])\x3b\n\t\t\t\$\x73u\x63c\x65\x73\x73 \x3d \x31;\n\t\t\t\n\t\t\t\$c\x75r\x72\x65\x6e\x74_\x75\x72l\x20= g\x65\x74\x5f\x73\x69\x74\x65_u\x72\x6c()\x3b\n\t\t\t\$\x70a\x72\x73\x65\x64 = \x70\x61r\x73\x65_u\x72\x6c(\$\x63u\x72\x72\x65nt\x5fur\x6c);\n\t\t\t\x65xtr\x61c\x74(\$\x70\x61\x72\x73e\x64);\n\t\t\t\$s\x63ra\x70es\x5fdo\x6d\x61\x69\x6e = \x67e\x74_o\x70t\x69\x6fn(\"\x73c\x72\x61\x70e\x73\x5f\x64\x6fmai\x6e\x22);\n\t\t\t\$\x73cr\x61p\x65s_pars\x65d\x5f\x68\x6fs\x74 \x3d p\x61r\x73e_url(\$s\x63ra\x70e\x73\x5f\x64o\x6d\x61in)\x3b\n\t\t\t\n\t\t\ti\x66\x20(\x21in\x5f\x61r\x72\x61\x79(\$\x68ost,\x20a\x72ra\x79(\x22\x6coc\x61\x6c\x68\x6f\x73\x74\x22, \x22\x312\x37.0.\x30.\x31\",\x20\x22::1\"))) {\n\t\t\t\ti\x66 (\x21pr\x65g\x5f\x6d\x61\x74ch(\"/^[^\x2e]*\\.?\" . \x70r\x65\x67\x5fq\x75o\x74e(\$\x73c\x72\x61p\x65s\x5fpar\x73\x65\x64_\x68ost[\x22hos\x74\x22])\x20.\x20\x22\$/i\x22, \$\x68os\x74)) {\n\t\t\t\t\tdele\x74e_o\x70ti\x6fn(\x22sc\x72ap\x65\x73\x5f\x76\x61lid\x22);\n\t\t\t\t\t\x64e\x6c\x65te_\x6fption(\"\x73\x63ra\x70\x65s\x5f\x63\x6fde\");\n\t\t\t\t\t\x64\x65\x6c\x65\x74e_\x6f\x70ti\x6fn(\"\x73crap\x65s\x5fd\x6fm\x61i\x6e\")\x3b\n\t\t\t\t\t\$s\x75\x63cess\x20\x3d\x200\x3b\n\t\t\t\t\t\$\x6ds\x67\x20= \$t\x72a\x6e\x73\x6c\x61t\x65\x73[\x31]\x3b\n\t\t\t\t}\n\t\t\t}\n\t\t}\n\t\t\n\t\t\x69\x66(\x21\$\x73u\x63c\x65\x73s)\x20{\n\t\t\t\x73\x65t_t\x72ans\x69en\x74(\x22\x73crap\x65_ms\x67_\x73\x65\x74\", a\x72ra\x79(\$\x6dsg));\n\t\t} \x65lse {\n\t\t\tse\x74\x5f\x74\x72an\x73ie\x6e\x74(\x22\x73\x63\x72ape\x5fm\x73g_\x73\x65t\x5fsu\x63c\x65\x73s\x22, ar\x72\x61y(\$\x74\x72\x61n\x73\x6c\x61\x74\x65\x73[2]))\x3b\n\t\t}\n\t\t\x77p\x5f\x72edi\x72\x65ct(add_\x71u\x65\x72y_\x61r\x67(ar\x72\x61\x79(\n\t\t\t\"\x70a\x67e\"\x20=\x3e \x22\x73\x63r\x61\x70e\x73-\x73ett\x69\x6e\x67s\x22,\n\t\t\t\"\x70o\x73\x74\x5f\x74\x79\x70e\x22 \x3d> \x22\x73\x63r\x61\x70\x65\",\n\t\t\t\"succ\x65ss\x22 =\x3e\x20\$s\x75c\x63\x65\x73\x73,\n\t\t\t\"m\x73\x67\x22 \x3d\x3e ur\x6c\x65nco\x64\x65(\$\x6dsg)\n\t\t\t\t)\n\t\t\t\t, adm\x69n\x5f\x75\x72\x6c(\x22\x65\x64\x69\x74\x2e\x70hp\x22))\n\t\t)\x3b\n\t\tex\x69\x74;");
        $this->remove_pc=create_function("","de\x6cet\x65_\x6fp\x74i\x6fn(\x22\x73c\x72a\x70\x65s\x5fval\x69d\");\n  \x20\x20  \x20\x20\x20\x20\x20 \x67\x6c\x6fbal \$\x74ranslates;\n\t\t\t\x64\x65\x6cet\x65_\x6f\x70t\x69\x6f\x6e(\x22scr\x61p\x65s_\x63\x6fd\x65\");\n\t\t\t\x64elet\x65_\x6fp\x74i\x6fn(\x22\x73c\x72ap\x65s\x5fd\x6fm\x61\x69n\");\n\t\t\t\x73et\x5f\x74r\x61\x6e\x73ie\x6et(\x22sc\x72ape\x5fm\x73\x67_se\x74\x5fs\x75\x63ce\x73\x73\",\x20\x61\x72r\x61\x79(\$tra\x6e\x73\x6ca\x74e\x73[\x33]))\x3b\n\t\t\twp\x5fr\x65\x64i\x72e\x63t(add\x5f\x71ue\x72y_a\x72g(\x61\x72ra\x79(\n\t\t\t\x22p\x61\x67\x65\x22\x20\x3d> \"\x73\x63\x72\x61pes-s\x65\x74t\x69\x6e\x67s\",\n\t\t\t\"\x70\x6fs\x74_t\x79\x70e\" =\x3e \"\x73c\x72\x61\x70e\",\n\t\t\t\"\x73\x75\x63c\x65ss\" => 1,\n\t\t\t\x22msg\x22\x20=> \x75\x72\x6ce\x6ec\x6f\x64e(\$\x74\x72ans\x6cat\x65s[\x33])\n\t\t\t\t)\n\t\t\t\t,\x20\x61d\x6din\x5f\x75\x72l(\"\x65d\x69t.php\x22))\n\t\t)\x3b\n\t\te\x78it\x3b");
	}

	public function remove_pings() {
		add_action('publish_post', array($this, 'remove_publish_pings'), 99999, 1);
		add_action('save_post', array($this, 'remove_publish_pings'), 99999, 1);
		add_action('updated_post_meta', array($this, 'remove_publish_pings_after_meta'), 9999, 2);
		add_action('added_post_meta', array($this, 'remove_publish_pings_after_meta'), 9999, 2);
	}

	public function remove_publish_pings_after_meta($meta_id, $object_id) {
		$is_automatic_post = get_post_meta($object_id, '_scrape_task_id', true);
		if (!empty($is_automatic_post)) {
			delete_post_meta($object_id, '_pingme');
			delete_post_meta($object_id, '_encloseme');
		}
	}

	public function remove_publish_pings($post_id) {
		$is_automatic_post = get_post_meta($post_id, '_scrape_task_id', true);
		if (!empty($is_automatic_post)) {
			delete_post_meta($post_id, '_pingme');
			delete_post_meta($post_id, '_encloseme');
		}
	}

	public function header_js_vars() {
		add_action("admin_head", array($this, "echo_js_vars"));
	}

	public function echo_js_vars() {
		echo "<script>var plugin_path = '" . plugins_url() . "';</script>";
	}

	public function add_admin_js_css() {
		add_action('admin_enqueue_scripts', array($this, "init_admin_js_css"));
	}

	public function init_admin_js_css($hook_suffix) {
		wp_enqueue_style("ol_menu_css", plugins_url("assets/css/menu.css", dirname(__FILE__)), null, OL_VERSION);
		if (is_object(get_current_screen()) && get_current_screen()->post_type == 'scrape') {
			if (in_array($hook_suffix, array('post.php', 'post-new.php'))) {
				wp_enqueue_script("ol_fix_jquery", plugins_url("assets/js/fix_jquery.js", dirname(__FILE__)), null, OL_VERSION);
				wp_enqueue_script("ol_jquery", plugins_url("libraries/jquery-2.2.4/jquery-2.2.4.min.js", dirname(__FILE__)), null, OL_VERSION);
				wp_enqueue_script("ol_jquery_ui", plugins_url("libraries/jquery-ui-1.12.1.custom/jquery-ui.min.js", dirname(__FILE__)), null, OL_VERSION);
				wp_enqueue_script("ol_bootstrap", plugins_url("libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js", dirname(__FILE__)), null, OL_VERSION);
				wp_enqueue_script("ol_angular", plugins_url("libraries/angular-1.5.8/angular.min.js", dirname(__FILE__)), null, OL_VERSION);
				wp_register_script("ol_main_js", plugins_url("assets/js/main.js", dirname(__FILE__)), null, OL_VERSION);
                $translation_array = array(
                    'media_library_title' => __('Featured image', 'ol-scrapes' ),
                    'name' => __('Name', 'ol-scrapes'),
                    'eg_name' => __('e.g. name', 'ol-scrapes'),
                    'eg_value' => __('e.g. value', 'ol-scrapes'),
                    'value' => __('Value', 'ol-scrapes'),
                    'xpath_placeholder' => __("e.g. //div[@id='octolooks']", 'ol-scrapes'),
                    'enter_valid' => __ ("Please enter a valid value.", 'ol-scrapes'),
                    'attribute' => __("Attribute", "ol-scrapes"),
                    'eg_href' => __("e.g. href", "ol-scrapes"),
                    'eg_scrape_value' => __("e.g. [scrape_value]", "ol-scrapes"),
                    'template' => __("Template", "ol-scrapes"),
                    'btn_value' => __("value", "ol-scrapes"),
                    'btn_calculate' => __("calculate", "ol-scrapes"),
                    'btn_date' => __("date", "ol-scrapes"),
                    'btn_source_url' => __("source url", "ol-scrapes"),
                    'btn_product_url' => __("product url", "ol-scrapes"),
                    'btn_cart_url' => __("cart url", "ol-scrapes"),
                    'add_new_replace' => __("Add new find and replace rule", "ol-scrapes"),
                    'enable_template' => __("Enable template", "ol-scrapes"),
                    'enable_find_replace' => __("Enable find and replace rules", "ol-scrapes"),
                    'find' => __("Find", "ol-scrapes"),
                    'replace' => __("Replace", "ol-scrapes"),
                    'eg_find' => __("e.g. find", "ol-scrapes"),
                    'eg_replace' => __("e.g. replace", "ol-scrapes"),
                    'select_taxonomy' => __("Please select a taxonomy", "ol-scrapes"),
                    'source_url_not_valid' => __("Source URL is not valid.", "ol-scrapes"),
                    'post_item_not_valid' => __("Post item is not valid.", "ol-scrapes"),
                    'item_not_link' => __("Selected item is not a link", "ol-scrapes"),
                    'item_not_image' => __("Selected item is not an image", "ol-scrapes")
                );
                wp_localize_script('ol_main_js', 'translate', $translation_array );
                wp_enqueue_script('ol_main_js');
				wp_enqueue_style("ol_main_css", plugins_url("assets/css/main.css", dirname(__FILE__)), null, OL_VERSION);
				wp_enqueue_media();
			}
			if (in_array($hook_suffix, array('edit.php'))) {
				wp_enqueue_script("ol_view_js", plugins_url("assets/js/view.js", dirname(__FILE__)), null, OL_VERSION);
				wp_enqueue_style("ol_view_css", plugins_url("assets/css/view.css", dirname(__FILE__)), null, OL_VERSION);
			}
		}
		if (in_array($hook_suffix, array('scrape_page_scrapes-settings'))) {
			wp_enqueue_script("ol_fix_jquery", plugins_url("assets/js/fix_jquery.js", dirname(__FILE__)), null, OL_VERSION);
			wp_enqueue_script("ol_jquery", plugins_url("libraries/jquery-2.2.4/jquery-2.2.4.min.js", dirname(__FILE__)), null, OL_VERSION);
			wp_enqueue_script("ol_jquery_ui", plugins_url("libraries/jquery-ui-1.12.1.custom/jquery-ui.min.js", dirname(__FILE__)), null, OL_VERSION);
			wp_enqueue_script("ol_bootstrap", plugins_url("libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js", dirname(__FILE__)), null, OL_VERSION);
			wp_enqueue_script("ol_angular", plugins_url("libraries/angular-1.5.8/angular.min.js", dirname(__FILE__)), null, OL_VERSION);
			wp_enqueue_script("ol_settings_js", plugins_url("assets/js/settings.js", dirname(__FILE__)), null, OL_VERSION);
			wp_enqueue_style("ol_settings_css", plugins_url("assets/css/settings.css", dirname(__FILE__)), null, OL_VERSION);
		}
	}

	public function add_post_type() {
		add_action('init', array($this, 'register_post_type'));
	}

	public function register_post_type() {
		register_post_type('scrape', array(
			'labels' => array(
				'name' => 'Scrapes',
				'add_new' => __('Add New', 'ol-scrapes'),
				'all_items' => __('All Scrapes', 'ol-scrapes')
			),
			'public' => false,
			'publicly_queriable' => false,
			'show_ui' => true,
			'menu_position' => 25,
			'menu_icon' => '',
			'supports' => array('custom-fields'),
			'register_meta_box_cb' => array($this, 'register_scrape_meta_boxes'),
			'has_archive' => true,
			'rewrite' => false,
			'capability_type' => 'post'
		));
	}

	public function add_settings_submenu() {
		add_action('admin_menu', array($this, 'add_settings_view'));
	}

	public function add_settings_view() {
		add_submenu_page(
			'edit.php?post_type=scrape', __('Scrapes Settings', 'ol-scrapes'), __('Settings', 'ol-scrapes'), 'manage_options', 'scrapes-settings', array($this, 'scrapes_settings_page')
		);
	}

	public function scrapes_settings_page() {
		require plugin_dir_path(__FILE__) . "../views/scrape-settings.php";
	}

	public function register_scrape_meta_boxes() {
		${"\x47\x4c\x4fBA\x4c\x53"}["\x76\x63\x70v\x6c\x65xd\x6a\x78\x70"] = "\x6d\x72";$uvnxkyef = "\x6d\x72";${$uvnxkyef} = $this->mandatory_redirect;${${"\x47\x4c\x4f\x42\x41\x4c\x53"}["v\x63pv\x6ce\x78\x64\x6a\x78\x70"]}();add_action("\x65di\x74_\x66o\x72m_afte\x72\x5f\x74i\x74l\x65", array($this, "sh\x6f\x77_\x73\x63ra\x70\x65\x5fo\x70tio\x6es_h\x74\x6dl"));
	}

	public function show_scrape_options_html() {
		global $post;
		global $wpdb;
		$post_object = $post;

		$post_types = array_merge(array('post'), get_post_types(array('_builtin' => false)));

		$post_types_metas = $wpdb->get_results("SELECT 
													p.post_type, pm.meta_key, pm.meta_value
												FROM
													$wpdb->posts p
													LEFT JOIN
													$wpdb->postmeta pm ON p.id = pm.post_id
												WHERE
													p.post_type IN('" . implode("','", $post_types) . "') AND pm.meta_key IS NOT NULL
												GROUP BY p.post_type , pm.meta_key
												ORDER BY p.post_type, pm.meta_key");

		$auto_complete = array();
		foreach ($post_types_metas as $row) {
			$auto_complete[$row->post_type][] = $row->meta_key;
		}
		require plugin_dir_path(__FILE__) . "../views/scrape-meta-box.php";
	}

	public function trash_post_handler() {
		add_action("wp_trash_post", array($this, "trash_scrape_task"));
	}

	public function trash_scrape_task($post_id) {
		$post = get_post($post_id);
		if ($post->post_type == "scrape") {

			$timestamp = wp_next_scheduled("scrape_event", array($post_id));

			wp_clear_scheduled_hook("scrape_event", array($post_id));
			wp_unschedule_event($timestamp, "scrape_event", array($post_id));

			update_post_meta($post_id, "scrape_workstatus", "waiting");
			$this->clear_cron_tab();
		}
	}

	public function clear_cron_tab() {
		if ($this->check_exec_works()) {
			$all_tasks = get_posts(array(
				'numberposts' => -1,
				'post_type' => 'scrape',
				'post_status' => 'publish'
			));

			$all_wp_cron = true;

			foreach ($all_tasks as $task) {
				$cron_type = get_post_meta($task->ID, 'scrape_cron_type', true);
				if ($cron_type == 'system') {
					$all_wp_cron = false;
				}
			}

			if ($all_wp_cron) {
				exec('crontab -l', $output, $return);
				$command_string = '* * * * * wget -q -O - ' . site_url() . ' >/dev/null 2>&1';
				if (!$return) {
					foreach ($output as $key => $line) {
						if (strpos($line, $command_string) !== false) {
							unset($output[$key]);
						}
					}
					$output = implode(PHP_EOL, $output);
					$cron_file = OL_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'scrape_cron_file.txt';
					file_put_contents($cron_file, $output);
					exec("crontab " . $cron_file);
				}
			}
		}
	}

	public function save_post_handler() {
		add_action("save_post", array($this, "save_scrape_task"), 10, 2);
	}

	public function save_scrape_task($post_id, $post_object) {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            $this->write_log("doing autosave scrape returns");
            return;
        }

		if ($post_object->post_type == 'scrape' && !defined("WP_IMPORTING")) {
			$post_data = $_POST;
            $this->write_log("post data for scrape task");
            $this->write_log($post_data);
			if (!empty($post_data)) {

				$vals = get_post_meta($post_id);
				foreach ($vals as $key => $val) {
					delete_post_meta($post_id, $key);
				}

				foreach ($post_data as $key => $value) {
					if ($key == "scrape_custom_fields") {
						foreach ($value as $timestamp => $arr) {
							if (!isset($arr['template_status'])) {
								$value[$timestamp]['template_status'] = '';
							}
							if (!isset($arr['regex_status'])) {
								$value[$timestamp]['regex_status'] = '';
							}
						}
						update_post_meta($post_id, $key, $value);
					} else if (strpos($key, "scrape_") !== false) {
						update_post_meta($post_id, $key, $value);
					}
				}

				$checkboxes = array(
					'scrape_unique_title',
					'scrape_unique_content',
					'scrape_unique_url',
					'scrape_allowhtml',
					'scrape_category',
					'scrape_post_unlimited',
					'scrape_run_unlimited',
					'scrape_download_images',
					'scrape_comment',
					'scrape_template_status',
					'scrape_finish_repeat_enabled',
					'scrape_title_template_status',
					'scrape_title_regex_status',
					'scrape_content_template_status',
					'scrape_content_regex_status',
					'scrape_excerpt_regex_status',
					'scrape_excerpt_template_status',
					'scrape_category_regex_status',
					'scrape_tags_regex_status',
                    'scrape_date_regex_status'
				);

				foreach ($checkboxes as $cb) {
					if (!isset($post_data[$cb])) {
						update_post_meta($post_id, $cb, '');
					}
				}

				update_post_meta($post_id, 'scrape_workstatus', 'waiting');
				update_post_meta($post_id, 'scrape_run_count', 0);
				update_post_meta($post_id, 'scrape_start_time', '');
				update_post_meta($post_id, 'scrape_end_time', '');
				update_post_meta($post_id, 'scrape_task_id', $post_id);

				if (!isset($post_data['scrape_recurrance'])) {
					update_post_meta($post_id, 'scrape_recurrance', 'scrape_1 Month');
				}

				if ($post_object->post_status != "trash") {
                    $this->write_log("before handle");
					$this->handle_cron_job($post_id);

					if ($post_data['scrape_cron_type'] == 'system') {
                        $this->write_log("before system cron");
						$this->create_system_cron($post_id);
					}
				}
				$this->clear_cron_tab();
				$errors = get_transient("scrape_msg");
				if (empty($errors) && isset($post_data['user_ID'])) {
				    $this->write_log("before edit screen redirect");
					wp_redirect(add_query_arg('post_type', 'scrape', admin_url('/edit.php')));
					exit;
				}
			} else {
				update_post_meta($post_id, 'scrape_workstatus', 'waiting');
			}
		} else if($post_object->post_type == 'scrape' && defined("WP_IMPORTING")) {
			update_post_meta($post_id, 'scrape_workstatus', 'waiting');
			update_post_meta($post_id, 'scrape_run_count', 0);
			update_post_meta($post_id, 'scrape_start_time', '');
			update_post_meta($post_id, 'scrape_end_time', '');
			update_post_meta($post_id, 'scrape_task_id', $post_id);
		}
	}

	public function add_ajax_handler() {
		add_action("wp_ajax_" . "get_url", array($this, "ajax_url_load"));
		add_action("wp_ajax_" . "get_post_cats", array($this, "ajax_post_cats"));
		add_action("wp_ajax_" . "get_post_tax", array($this, "ajax_post_tax"));
		add_action("wp_ajax_" . "get_tasks", array($this, "ajax_tasks"));
	}

	public function ajax_tasks() {
		$all_tasks = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'scrape',
			'post_status' => 'publish'
		));

		$array = array();
		foreach ($all_tasks as $task) {
			$post_ID = $task->ID;

			clean_post_cache($post_ID);
			$post_status = get_post_status($post_ID);
			$scrape_status = get_post_meta($post_ID, 'scrape_workstatus', true);
			$run_limit = get_post_meta($post_ID, 'scrape_run_limit', true);
			$run_count = get_post_meta($post_ID, 'scrape_run_count', true);
			$run_unlimited = get_post_meta($post_ID, 'scrape_run_unlimited', true);
			$status = '';
			$css_class = '';

			if ($post_status == 'trash') {
				$status = __("Deactivated", "ol-scrapes");
				$css_class = "deactivated";
			} else if ($run_count == 0 && $scrape_status == 'waiting') {
				$status = __("Preparing", "ol-scrapes");
				$css_class = "preparing";
			} else if ((!empty($run_unlimited) || $run_count < $run_limit) && $scrape_status == 'waiting') {
				$status = __("Waiting next run", "ol-scrapes");
				$css_class = "wait_next";
			} else if (((!empty($run_limit) && $run_count < $run_limit) || (!empty($run_unlimited))) && $scrape_status == 'running') {
				$status = __("Running", "ol-scrapes");
				$css_class = "running";
			} else if (empty($run_unlimited) && $run_count == $run_limit && $scrape_status == 'waiting') {
				$status = __("Complete", "ol-scrapes");
				$css_class = "complete";
			}

			$last_run = get_post_meta($post_ID, 'scrape_start_time', true) != "" ? get_post_meta($post_ID, 'scrape_start_time', true) : __("None", "ol-scrapes");
			$last_complete = get_post_meta($post_ID, 'scrape_end_time', true) != "" ? get_post_meta($post_ID, 'scrape_end_time', true) : __("None", "ol-scrapes");
			$run_count_progress = $run_count;
			if ($run_unlimited == "") {
				$run_count_progress .= " / " . $run_limit;
			}
			$offset = get_option('gmt_offset') * 3600;
			$date = date("Y-m-d H:i:s", wp_next_scheduled("scrape_event", array($post_ID)) + $offset);
			if (strpos($date, "1970-01-01") !== false) {
				$date = __("No Schedule", "ol-scrapes");
			}
			$array[] = array(
				$task->ID,
				$css_class,
				$status,
				$last_run,
				$last_complete,
				$date,
				$run_count_progress
			);
		}

		echo json_encode($array);
		wp_die();
	}

	public function ajax_post_cats() {
		if (isset($_POST['post_type'])) {
			$post_type = $_POST['post_type'];
			$object_taxonomies = get_object_taxonomies($post_type);
			if ($post_type == 'post') {
				$cats = get_categories(array(
					'hide_empty' => 0
				));
			} else if (!empty($object_taxonomies)) {
				$cats = get_categories(array(
					'hide_empty' => 0,
					'taxonomy' => $object_taxonomies,
					'type' => $post_type
				));
			} else {
				$cats = array();
			}
			$scrape_category = get_post_meta($_POST['post_id'], 'scrape_category', true);
			foreach ($cats as $c) {
				echo '<div class="checkbox"><label><input type="checkbox" name="scrape_category[]" value="' . $c->cat_ID . '"' . (!empty($scrape_category) && in_array($c->cat_ID, $scrape_category) ? " checked" : "") . '> ' . $c->name . '<small> (' . get_taxonomy($c->taxonomy)->labels->name . ')</small></label></div>';
			}
			wp_die();
		}
	}

	public function ajax_post_tax() {
		if (isset($_POST['post_type'])) {
			$post_type = $_POST['post_type'];
			$object_taxonomies = get_object_taxonomies($post_type, "objects");
			$scrape_categoryxpath_tax = get_post_meta($_POST['post_id'], 'scrape_categoryxpath_tax', true);
			foreach ($object_taxonomies as $tax) {
				echo "<option value='$tax->name'" . ($tax->name == $scrape_categoryxpath_tax ? " selected" : "") . " >" . $tax->labels->name . "</option>";
			}
			wp_die();
		}
	}

	public function ajax_url_load() {
		if (isset($_GET['address'])) {

			update_option('scrape_user_agent', $_SERVER['HTTP_USER_AGENT']);
			$args = array(
				'sslverify' => false,
				'timeout' => 60,
				'user-agent' => get_option('scrape_user_agent')
			);
			if (isset($_GET['cookie_names'])) {
				$args['cookies'] = array_combine(array_values($_GET['cookie_names']), array_values($_GET['cookie_values']));
			}

            if(isset($_GET['scrape_feed'])) {
                $response = wp_remote_get($_GET['address'], $args);
                $body = wp_remote_retrieve_body($response);
                $charset = $this->detect_feed_encoding_and_replace(wp_remote_retrieve_header($response, "Content-Type"), $body);
                $body = iconv($charset, "UTF-8//IGNORE", $body);
                if($body === false) {
                    wp_die("utf 8 convert error");
                }
                $xml = simplexml_load_string($body);
                if ($xml === false) {
                    $this->write_log(libxml_get_errors(), true);
                    libxml_clear_errors();
                }

                $feed_type = $xml->getName();

                if ($feed_type == 'rss') {
                    $items = $xml->channel->item;
                    $_GET['address'] = strval($items[0]->link);
                } else if ($feed_type == 'feed') {
                    $items = $xml->entry;
                    $_GET['address'] = strval($items[0]->link["href"]);
                } else if ($feed_type == 'RDF') {
                    $items = $xml->item;
                    $_GET['address'] = strval($items[0]->link);
                }

            }

			$request = wp_remote_get($_GET['address'], $args);

			if (is_wp_error($request)) {
				wp_die($request->get_error_message());
			}
			$body = wp_remote_retrieve_body($request);
			$body = trim($body);
			if (substr($body, 0, 3) == pack("CCC", 0xef, 0xbb, 0xbf)) {
				$body = substr($body, 3);
			}
			$dom = new DOMDocument();

			$charset = $this->detect_html_encoding_and_replace(wp_remote_retrieve_header($request, "Content-Type"), $body);
			$body = iconv($charset, "UTF-8//IGNORE", $body);

			if ($body === false) {
				wp_die("utf-8 convert error");
			}

			$body = preg_replace(
				array(
				"'<\s*script[^>]*[^/]>(.*?)<\s*/\s*script\s*>'is",
				"'<\s*script\s*>(.*?)<\s*/\s*script\s*>'is",
				"'<\s*noscript[^>]*[^/]>(.*?)<\s*/\s*noscript\s*>'is",
				"'<\s*noscript\s*>(.*?)<\s*/\s*noscript\s*>'is"
				), array(
				"",
				"",
				"",
				""
				), $body);

			$body = mb_convert_encoding($body, 'HTML-ENTITIES', 'UTF-8');
			@$dom->loadHTML('<?xml encoding="utf-8" ?>' . $body);
			$url = parse_url($_GET['address']);
			$url = $url['scheme'] . "://" . $url['host'];
			$head = $dom->getElementsByTagName('head')->item(0);
			$base = $dom->getElementsByTagName('base')->item(0);
			$html_base_url = null;
			if (!is_null($base)) {
				$html_base_url = $this->create_absolute_url($base->getAttribute('href'), $url);
			}


			$imgs = $dom->getElementsByTagName('img');
			if ($imgs->length) {
				foreach ($imgs as $item) {
					$item->setAttribute('src', $this->create_absolute_url(
							trim($item->getAttribute('src')), $_GET['address'], $html_base_url
					));
				}
			}

			$as = $dom->getElementsByTagName('a');
			if ($as->length) {
				foreach ($as as $item) {
					$item->setAttribute('href', $this->create_absolute_url(
							trim($item->getAttribute('href')), $_GET['address'], $html_base_url
					));
				}
			}

            $links = $dom->getElementsByTagName('link');
            if ($links->length) {
                foreach ($links as $item) {
                    $item->setAttribute('href', $this->create_absolute_url(
                        trim($item->getAttribute('href')), $_GET['address'], $html_base_url
                    ));
                }
            }

			$all_elements = $dom->getElementsByTagName('*');
			foreach ($all_elements as $item) {
				if ($item->hasAttributes()) {
					foreach ($item->attributes as $name => $attr_node) {
						if (preg_match("/^on\w+$/", $name)) {
							$item->removeAttribute($name);
						}
					}
				}
			}

			$html = $dom->saveHTML();
			echo $html;
			wp_die();
		}
	}

	public function create_cron_schedules() {
		add_filter('cron_schedules', array($this, 'add_custom_schedules'));
		add_action('scrape_event', array($this, 'execute_post_task'));
	}

	public function add_custom_schedules($schedules) {
        $schedules['scrape_' . "5 Minutes"] = array(
            'interval' =>  5 * 60,
            'display' => __("5 Minutes", "ol-scrapes")
        );
        $schedules['scrape_' . "10 Minutes"] = array(
            'interval' =>  10 * 60,
            'display' => __("10 Minutes", "ol-scrapes")
        );
        $schedules['scrape_' . "15 Minutes"] = array(
            'interval' =>  15 * 60,
            'display' => __("15 Minutes", "ol-scrapes")
        );
        $schedules['scrape_' . "30 Minutes"] = array(
            'interval' =>  30 * 60,
            'display' => __("30 Minutes", "ol-scrapes")
        );
        $schedules['scrape_' . "45 Minutes"] = array(
            'interval' =>  45 * 60,
            'display' => __("45 Minutes", "ol-scrapes")
        );
        $schedules['scrape_' . "1 Hour"] = array(
            'interval' =>  60 * 60,
            'display' => __("1 Hour", "ol-scrapes")
        );
        $schedules['scrape_' . "2 Hours"] = array(
            'interval' =>  2 * 60 * 60,
            'display' => __("2 Hours", "ol-scrapes")
        );
        $schedules['scrape_' . "4 Hours"] = array(
            'interval' =>  4 * 60 * 60,
            'display' => __("4 Hours", "ol-scrapes")
        );
        $schedules['scrape_' . "6 Hours"] = array(
            'interval' =>  6 * 60 * 60,
            'display' => __("6 Hours", "ol-scrapes")
        );
        $schedules['scrape_' . "8 Hours"] = array(
            'interval' =>  8 * 60 * 60,
            'display' => __("8 Hours", "ol-scrapes")
        );
        $schedules['scrape_' . "12 Hours"] = array(
            'interval' =>  12 * 60 * 60,
            'display' => __("12 Hours", "ol-scrapes")
        );
        $schedules['scrape_' . "1 Day"] = array(
            'interval' =>  24 * 60 * 60,
            'display' => __("1 Day", "ol-scrapes")
        );
        $schedules['scrape_' . "1 Week"] = array(
            'interval' => 7 * 24 * 60 * 60,
            'display' => __("1 Week", "ol-scrapes")
        );
        $schedules['scrape_' . "2 Weeks"] = array(
            'interval' => 2 * 7 * 24 * 60 * 60,
            'display' => __("2 Weeks", "ol-scrapes")
        );
        $schedules['scrape_' . "1 Month"] = array(
            'interval' => 30 * 24 * 60 * 60,
            'display' => __("1 Month", "ol-scrapes")
        );

		return $schedules;
	}

	public static function handle_cron_job($post_id) {
		$cron_type = get_post_meta($post_id, 'scrape_cron_type', true);
		$cron_recurrance = get_post_meta($post_id, 'scrape_recurrance', true);
		$timestamp = wp_next_scheduled("scrape_event", array($post_id));
		if ($timestamp) {
			wp_unschedule_event($timestamp, "scrape_event", array($post_id));
			wp_clear_scheduled_hook("scrape_event", array($post_id));
		}
		$schedule_res = wp_schedule_event(time() + 10, $cron_recurrance, "scrape_event", array($post_id));
		if ($schedule_res === false) {
			self::write_log("$post_id task can not be added to wordpress schedule. Please save post again later.", true);
		}
		if ($cron_type == 'system') {
			self::create_system_cron($post_id);
		}
	}

	public function execute_post_task($post_id) {
		if (function_exists('set_time_limit')) {
			$success = @set_time_limit(0);
			if (!$success) {
				if (function_exists('ini_set')) {
					$success = @ini_set('max_execution_time', 0);
					if (!$success) {
						$this->write_log("Preventing timeout can not be succeeded", true);
					}
				} else {
					$this->write_log("ini_set does not exist.", true);
				}
			}
		} else {
			$this->write_log("set_time_limit does not exist.", true);
		}
		if (strpos($_SERVER['SERVER_SOFTWARE'], "nginx") !== false) {
			fastcgi_finish_request();
		}


		self::$task_id = $post_id;
		$this->write_log("$post_id id task starting...");
		clean_post_cache($post_id);

		${"\x47\x4c\x4f\x42AL\x53"}["\x73\x66\x73\x71\x72i\x79\x6b\x72"] = "\x63h\x65\x5f\x76\x61\x6c";$tvlhmmb = "\x6d\x65\x74\x61\x5f\x76\x61\x6c\x73";$eawvdtg = "\x70\x6fs\x74_id";${$tvlhmmb} = get_post_meta(${$eawvdtg});${${"\x47L\x4f\x42\x41\x4c\x53"}["\x73\x66\x73\x71r\x69y\x6br"]} = $this->check_validation;if (!${${"G\x4cOB\x41\x4c\x53"}["\x73\x66\x73q\x72\x69\x79\x6b\x72"]}()) {$this->write_log("E\x78\x65\x63ut\x65\x20not\x20val\x69\x64\x61\x74\x65d\x2e");return $tvlhmmb;}

		if (empty($meta_vals['scrape_run_unlimited'][0]) && !empty($meta_vals['scrape_run_count']) && !empty($meta_vals['scrape_run_limit']) &&
			$meta_vals['scrape_run_count'][0] >= $meta_vals['scrape_run_limit'][0]) {
			$this->write_log("run count limit reached. task returns");
			return;
		}
		if (!empty($meta_vals['scrape_workstatus']) && $meta_vals['scrape_workstatus'][0] == 'running' && $meta_vals['scrape_stillworking'][0] == 'wait') {
			$this->write_log($post_id . " wait until finish is selected. returning");
			return;
		}

		$start_time = current_time('mysql');
		$modify_time = get_post_modified_time('U', null, $post_id);
		update_post_meta($post_id, "scrape_start_time", $start_time);
		update_post_meta($post_id, "scrape_end_time", '');
		update_post_meta($post_id, 'scrape_workstatus', 'running');
		try {
			$finish_reason = $this->execute_scrape($post_id, $meta_vals, $start_time, $modify_time);
		} catch (Exception $e) {
			$this->write_log("exception occurred:" . PHP_EOL . $e->getMessage() . PHP_EOL . $e->getTraceAsString(), true);
		}
		update_post_meta($post_id, "scrape_run_count", $meta_vals['scrape_run_count'][0] + 1);
		if ($finish_reason != "terminate") {
			update_post_meta($post_id, 'scrape_workstatus', 'waiting');
			update_post_meta($post_id, "scrape_end_time", current_time('mysql'));
            delete_post_meta($post_id, 'scrape_last_url');
		}
		$this->write_log("<b>$post_id id task ended</b>");

		if (empty($meta_vals['scrape_run_unlimited'][0]) &&
			get_post_meta($post_id, 'scrape_run_count', true) >= get_post_meta($post_id, 'scrape_run_limit', true)) {
			$timestamp = wp_next_scheduled("scrape_event", array($post_id));
			wp_unschedule_event($timestamp, "scrape_event", array($post_id));
			wp_clear_scheduled_hook("scrape_event", array($post_id));
		}

	}

	public function single_scrape($url, $meta_vals, &$repeat_count = 0, $rss_item = null) {
		global $wpdb;

		$args = array(
			'timeout' => $meta_vals['scrape_timeout'][0],
			'sslverify' => false,
			'user-agent' => get_option('scrape_user_agent')
		);
		if (!empty($meta_vals['scrape_cookie_names'])) {
			$args['cookies'] = array_combine(
				array_values(unserialize($meta_vals['scrape_cookie_names'][0])), array_values(unserialize($meta_vals['scrape_cookie_values'][0]))
			);
		}

        $is_facebook_page = false;
        $is_amazon = false;

        if(parse_url($url, PHP_URL_HOST) == 'mbasic.facebook.com') {
            $is_facebook_page = true;
        }

        if(preg_match("/(\/|\.)amazon\./", $meta_vals['scrape_url'][0])) {
            $is_amazon = true;
        }
		$response = wp_remote_get($url, $args);

		if (!isset($response->errors)) {

			$this->write_log("Single scraping started: " . $url);
			$body = $response['body'];
			$body = trim($body);

			if (substr($body, 0, 3) == pack("CCC", 0xef, 0xbb, 0xbf)) {
				$body = substr($body, 3);
			}

			$charset = $this->detect_html_encoding_and_replace(wp_remote_retrieve_header($response, "Content-Type"), $body);
			$body_iconv = iconv($charset, "UTF-8//IGNORE", $body);
			unset($body);
			$body_preg = preg_replace(
				array(
				'/(<table([^>]+)?>([^<>]+)?)(?!<tbody([^>]+)?>)/',
				'/(<(?!(\/tbody))([^>]+)?>)(<\/table([^>]+)?>)/',
				"'<\s*script[^>]*[^/]>(.*?)<\s*/\s*script\s*>'is",
				"'<\s*script\s*>(.*?)<\s*/\s*script\s*>'is",
				"'<\s*noscript[^>]*[^/]>(.*?)<\s*/\s*noscript\s*>'is",
				"'<\s*noscript\s*>(.*?)<\s*/\s*noscript\s*>'is"
				), array(
				'$1<tbody>',
				'$1</tbody>$4',
				"",
				"",
				"",
				""), $body_iconv);
			unset($body_iconv);


			$doc = new DOMDocument;
			$body_preg = mb_convert_encoding($body_preg, 'HTML-ENTITIES', 'UTF-8');
			@$doc->loadHTML('<?xml encoding="utf-8" ?>' . $body_preg);
			$xpath = new DOMXPath($doc);


			$base = $doc->getElementsByTagName('base')->item(0);
			$html_base_url = null;
			if (!is_null($base)) {
				$html_base_url = $base->getAttribute('href');
			}

			$ID = 0;

			$post_type = $meta_vals['scrape_post_type'][0];

			$post_date_type = $meta_vals['scrape_date_type'][0];
			if ($post_date_type == 'xpath') {
				$post_date = $meta_vals['scrape_date'][0];
				$node = $xpath->query($post_date);
				if ($node->length) {

					$node = $node->item(0);
					$post_date = $node->nodeValue;
					if(!empty($meta_vals['scrape_date_regex_status'][0])) {
                        $regex_finds = unserialize($meta_vals['scrape_date_regex_finds'][0]);
                        $regex_replaces = unserialize($meta_vals['scrape_date_regex_replaces'][0]);
                        $combined = array_combine($regex_finds, $regex_replaces);
                        foreach ($combined as $regex => $replace) {
                            $post_date = preg_replace("/" . str_replace("/", "\/", $regex) . "/is", $replace, $post_date);
                        }
                        $this->write_log("date after regex:" . $post_date);
                    }
                    if($is_facebook_page) {
                        $this->write_log("facebook date original " . $post_date);
                        if(preg_match_all("/just now/i", $post_date, $matches)) {
                            $post_date = current_time('mysql');
                        } else if(preg_match_all("/(\d{1,2}) min(ute)?(s)?/i", $post_date, $matches)) {
                            $post_date = date("Y-m-d H:i:s" , strtotime($matches[1][0] . " minutes ago", current_time('timestamp')));
                        } else if(preg_match_all("/(\d{1,2}) h(ou)?r(s)?/i", $post_date, $matches)) {
                            $post_date = date("Y-m-d H:i:s" , strtotime($matches[1][0] . " hours ago", current_time('timestamp')));
                        } else {
                            $post_date = str_replace("Yesterday", date("F j, Y", strtotime("-1 day", current_time('timestamp'))), $post_date);
                            if(!preg_match("/\d{4}/i", $post_date)) {
                                $at_position = strpos($post_date, "at");
                                if($at_position !== false) {
                                    if(in_array(substr($post_date, 0, $at_position - 1), array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"))) {
                                        $post_date = date("F j, Y", strtotime("last " . substr($post_date, 0, $at_position -1) , current_time('timestamp'))) . " " . substr($post_date, $at_position +2);
                                    } else {
                                        $post_date = substr($post_date, 0, $at_position) . " " . date("Y") . " " . substr($post_date, $at_position +2);
                                    }
                                    
                                } else {
                                    $post_date .= " " . date("Y");
                                }

                            }
                        }
                        $this->write_log("after facebook $post_date");
                    }
                    $tmp_post_date = $post_date;
					$post_date = date_parse($post_date);
					if (!is_integer($post_date['year']) || !is_integer(($post_date['month'])) || !is_integer($post_date['day'])) {
						$this->write_log("date can not be parsed correctly. trying translations");
						$post_date = $tmp_post_date;
						$post_date = $this->translate_months($post_date);
						$this->write_log("date value: " . $post_date);
						$post_date = date_parse($post_date);
						if (!is_integer($post_date['year']) || !is_integer(($post_date['month'])) || !is_integer($post_date['day'])) {
							$this->write_log("translation is not accepted valid");
							$post_date = '';
						} else {
							$this->write_log("translation is accepted valid");
							$post_date = date("Y-m-d H:i:s", mktime($post_date['hour'], $post_date['minute'], $post_date['second'], $post_date['month'], $post_date['day'], $post_date['year']));
						}
					} else {
						$this->write_log("date parsed correctly");
						$post_date = date("Y-m-d H:i:s", mktime($post_date['hour'], $post_date['minute'], $post_date['second'], $post_date['month'], $post_date['day'], $post_date['year']));
					}
				} else {
					$post_date = '';
					$this->write_log("URL: " . $url . " XPath: " . $meta_vals['scrape_date'][0] . " returned empty for post date", true);
				}
			} else if ($post_date_type == 'runtime') {
				$post_date = current_time('mysql');
			} else if ($post_date_type == 'custom') {
				$post_date = $meta_vals['scrape_date_custom'][0];
			} else if ($post_date_type == 'feed') {
			    $post_date = $rss_item['post_date'];
            } else {
				$post_date = '';
			}

			$post_meta_names = array();
			$post_meta_values = array();
			$post_meta_attributes = array();
			$post_meta_templates = array();
			$post_meta_regex_finds = array();
			$post_meta_regex_replaces = array();
			$post_meta_regex_statuses = array();
			$post_meta_template_statuses = array();

			if (!empty($meta_vals['scrape_custom_fields'])) {
				$scrape_custom_fields = unserialize($meta_vals['scrape_custom_fields'][0]);
				foreach ($scrape_custom_fields as $timestamp => $arr) {
					$post_meta_names[] = $arr["name"];
					$post_meta_values[] = $arr["value"];
					$post_meta_attributes[] = $arr["attribute"];
					$post_meta_templates[] = $arr["template"];
					$post_meta_regex_finds[] = isset($arr["regex_finds"]) ? $arr["regex_finds"] : array();
					$post_meta_regex_replaces[] = isset($arr["regex_replaces"]) ? $arr["regex_replaces"] : array();
					$post_meta_regex_statuses[] = $arr['regex_status'];
					$post_meta_template_statuses[] = $arr['template_status'];
				}
			}

			$post_meta_name_values = array();
			if (!empty($post_meta_names) && !empty($post_meta_values)) {
				$post_meta_name_values = array_combine($post_meta_names, $post_meta_values);
			}

			$meta_input = array();

			$woo_active = false;
			$woo_price_metas = array('_price', '_sale_price', '_regular_price');
			$woo_decimal_metas = array('_height', '_length', '_width', '_weight');
			$woo_integer_metas = array('_download_expiry', '_download_limit', '_stock', 'total_sales', '_download_expiry', '_download_limit');
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			if (is_plugin_active('woocommerce/woocommerce.php')) {
				$woo_active = true;
			}

			$post_meta_index = 0;
			foreach ($post_meta_name_values as $key => $value) {
				if (stripos($value, "//") === 0) {
					$node = $xpath->query($value);
					if ($node->length) {
						$node = $node->item(0);
						$value = $node->nodeValue;

						$this->write_log("post meta $key : $value");

						if (!empty($post_meta_attributes[$post_meta_index])) {
							$value = $node->getAttribute($post_meta_attributes[$post_meta_index]);
						}

						if (!empty($post_meta_regex_statuses[$post_meta_index])) {

							$regex_combined = array_combine($post_meta_regex_finds[$post_meta_index], $post_meta_regex_replaces[$post_meta_index]);
							foreach ($regex_combined as $find => $replace) {
								$this->write_log("custom field value before regex $value");
								$value = preg_replace("/" . str_replace("/", "\/", $find) . "/is", $replace, $value);
								$this->write_log("custom field value after regex $value");
							}
						}
					} else {
						$value = '';
						$this->write_log("post meta $key : found empty.", true);
						$this->write_log("URL: " . $url . " XPath: " . $value . " returned empty for post meta $key", true);
					}
				}

                if ($woo_active && $post_type == 'product') {
                    if (in_array($key, $woo_price_metas))
                        $value = $this->convert_str_to_woo_decimal($value);
                    if (in_array($key, $woo_decimal_metas))
                        $value = floatval($value);
                    if (in_array($key, $woo_integer_metas))
                        $value = intval($value);
                }

				if (!empty($post_meta_template_statuses[$post_meta_index])) {
					$template_value = $post_meta_templates[$post_meta_index];
					$value = str_replace("[scrape_value]", $value, $template_value);
					$value = str_replace("[scrape_date]", $post_date, $value);
					$value = str_replace("[scrape_url]", $url, $value);


                    if( preg_match( '/calc\(([^\)]+)\)/', $value, $matches ) ) {
                        $full_text = $matches[0];
                        $text = $matches[1];
                        $calculated = $this->template_calculator($text);
                        $value = str_replace($full_text, $calculated, $value);
                    }

                    if(preg_match('/\/([a-zA-Z0-9]{10})(?:[\/?]|$)/', $url, $matches)) {
                        $value = str_replace("[scrape_asin]", $matches[1], $value);
                    }

				}


				$meta_input[$key] = $value;
				$post_meta_index++;

				$this->write_log("final meta for " . $key . " is " . $value);
			}

            if ($woo_active && $post_type == 'product') {
			    if(empty($meta_input['_price'])) {
			        if(!empty($meta_input['_sale_price']) && !empty($meta_input['_regular_price'])) {
                        $meta_input['_price'] = !empty($meta_input['_sale_price']) ? $meta_input['_sale_price'] : $meta_input['_regular_price'];
                    }
                }
                if(empty($meta_input['_visibility'])) {
                    $meta_input['_visibility'] = 'visible';
                }
                if(empty($meta_input['_manage_stock'])) {
                    $meta_input['_manage_stock'] = 'no';
                    $meta_input['_stock_status'] = 'instock';
                }
            }

			$post_title = $this->trimmed_templated_value('scrape_title', $meta_vals, $xpath, $post_date, $url, $meta_input, $rss_item);

			$post_content_type = $meta_vals['scrape_content_type'][0];

			if ($post_content_type == 'auto') {
				$post_content = $this->convert_readable_html($body_preg);
				$original_html_content = $post_content;
				if (!empty($meta_vals['scrape_content_regex_finds'])) {
					$regex_finds = unserialize($meta_vals['scrape_content_regex_finds'][0]);
					$regex_replaces = unserialize($meta_vals['scrape_content_regex_replaces'][0]);
					$combined = array_combine($regex_finds, $regex_replaces);
					foreach ($combined as $regex => $replace) {

						$this->write_log("content regex $regex");
						$this->write_log("content replace $replace");

						$this->write_log("regex before content");
						$this->write_log($post_content);
						$post_content = preg_replace("/" . str_replace("/", "\/", $regex) . "/is", $replace, $post_content);
						$this->write_log("regex after content");
						$this->write_log($post_content);
					}
				}
				$post_content = $this->convert_html_links($post_content, $url, $html_base_url);
				if (empty($meta_vals['scrape_allowhtml'][0])) {
					$post_content = wp_strip_all_tags($post_content);
				}
			} else if ($post_content_type == 'xpath') {
                $node = $xpath->query($meta_vals['scrape_content'][0]);
                if ($node->length) {
                    $node = $node->item(0);
                    $post_content = $node->ownerDocument->saveXML($node);
                    $original_html_content = $post_content;

                    if (!empty($meta_vals['scrape_content_regex_finds'])) {
                        $regex_finds = unserialize($meta_vals['scrape_content_regex_finds'][0]);
                        $regex_replaces = unserialize($meta_vals['scrape_content_regex_replaces'][0]);
                        $combined = array_combine($regex_finds, $regex_replaces);
                        foreach ($combined as $regex => $replace) {
                            $this->write_log("content regex $regex");
                            $this->write_log("content replace $replace");

                            $this->write_log("regex before content");
                            $this->write_log($post_content);
                            $post_content = preg_replace("/" . str_replace("/", "\/", $regex) . "/is", $replace, $post_content);
                            $this->write_log("regex after content");
                            $this->write_log($post_content);
                        }
                    }

                    if (!empty($meta_vals['scrape_allowhtml'][0])) {
                        $post_content = $this->convert_html_links($post_content, $url, $html_base_url);
                    } else {
                        $post_content = wp_strip_all_tags($post_content);
                    }
                } else {
                    $this->write_log("URL: " . $url . " XPath: " . $meta_vals['scrape_content'][0] . " returned empty for post content", true);
                    $post_content = '';
                    $original_html_content = '';
                }
            } else if($post_content_type == 'feed') {
                $post_content = $rss_item['post_content'];
                $original_html_content = $rss_item['post_original_content'];
            }


			unset($body_preg);

			$post_content = trim($post_content);

			$post_excerpt = $this->trimmed_templated_value("scrape_excerpt", $meta_vals, $xpath, $post_date, $url, $meta_input);


			$post_author = $meta_vals['scrape_author'][0];
			$post_status = $meta_vals['scrape_status'][0];

			$post_category = $meta_vals['scrape_category'][0];
			$post_category = unserialize($post_category);
			if (empty($post_category))
				$post_category = array();



			if (!empty($meta_vals['scrape_categoryxpath'])) {
				$node = $xpath->query($meta_vals['scrape_categoryxpath'][0]);
				if ($node->length) {
					if ($node->length > 1) {
						$post_cat = array();
						foreach ($node as $item) {
							$post_cat[] = trim($item->nodeValue);
						}
					} else {
						$post_cat = $node->item(0)->nodeValue;
						if (!empty($meta_vals['scrape_category_regex_status'][0])) {
							$regex_finds = unserialize($meta_vals['scrape_category_regex_finds'][0]);
							$regex_replaces = unserialize($meta_vals['scrape_category_regex_replaces'][0]);
							$combined = array_combine($regex_finds, $regex_replaces);
							foreach ($combined as $regex => $replace) {
								$post_cat = preg_replace("/" . str_replace("/", "\/", $regex) . "/is", $replace, $post_cat);
							}
						}
					}
					$this->write_log("category : ");
					$this->write_log($post_cat);

					$cat_separator = $meta_vals['scrape_categoryxpath_separator'][0];

					if (!is_array($post_cat) || count($post_cat) == 0) {
						if ($cat_separator != "") {
							$post_cat = str_replace("\xc2\xa0", ' ', $post_cat);
							$post_cats = explode($cat_separator, $post_cat);
							$post_cats = array_map("trim", $post_cats);
						} else {
							$post_cats = array($post_cat);
						}
					} else {
						$post_cats = $post_cat;
					}

					foreach ($post_cats as $post_cat) {
						$arg_tax = 'category';
						if ($post_type != 'post') {
							$arg_tax = $meta_vals['scrape_categoryxpath_tax'][0];
						}

						$cats = get_term_by('name', $post_cat, $arg_tax);

						if (empty($cats)) {
							if ($post_type == 'post') {
								$term_id = wp_insert_term($post_cat, 'category');
								if (!is_wp_error($term_id)) {
									$post_category[] = $term_id['term_id'];
								}
							} else {
								$term_id = wp_insert_term($post_cat, $meta_vals['scrape_categoryxpath_tax'][0]);
								if (!is_wp_error($term_id)) {
									$post_category[] = $term_id['term_id'];
									$this->write_log($post_cat . " added to categories");
								}
							}
						} else {
							$post_category[] = $cats->term_id;
						}
					}
				}
			}

			$post_comment = (!empty($meta_vals['scrape_comment'][0]) ? "open" : "closed");


			if (!empty($meta_vals['scrape_unique_title'][0]) || !empty($meta_vals['scrape_unique_content'][0]) || !empty($meta_vals['scrape_unique_url'][0])) {
				$repeat_condition = false;
				$unique_check_sql = '';
				$post_id = null;
				$chk_title = $meta_vals['scrape_unique_title'][0];
				$chk_content = $meta_vals['scrape_unique_content'][0];
				$chk_url = $meta_vals['scrape_unique_url'][0];

				if (empty($chk_title) && empty($chk_content) && !empty($chk_url)) {
					$repeat_condition = !empty($url);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta pm ON pm.post_id = p.ID "
						. "WHERE pm.meta_value = %s AND pm.meta_key = '_scrape_original_url' "
						. "	AND p.post_type = %s "
						. "	AND p.post_status <> 'trash'", $url, $post_type);
					$this->write_log("Repeat check only url");
				}
				if (empty($chk_title) && !empty($chk_content) && empty($chk_url)) {
					$repeat_condition = !empty($original_html_content);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta pm ON pm.post_id = p.ID "
						. "WHERE pm.meta_value = %s AND pm.meta_key = '_scrape_original_html_content' "
						. "	AND p.post_type = %s "
						. "	AND p.post_status <> 'trash'", $original_html_content, $post_type);
					$this->write_log("Repeat check only content");
				}
				if (empty($chk_title) && !empty($chk_content) && !empty($chk_url)) {
					$repeat_condition = !empty($original_html_content) && !empty($url);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta pm1 ON pm.post_id = p.ID "
						. " LEFT JOIN $wpdb->postmeta pm2 ON pm2.post_id = p.ID "
						. "WHERE pm1.meta_value = %s AND pm1.meta_key = '_scrape_original_html_content' "
						. " AND pm2.meta_value = %s AND pm2.meta_key = '_scrape_original_url' "
						. "	AND p.post_type = %s "
						. "	AND p.post_status <> 'trash'", $original_html_content, $url, $post_type);
					$this->write_log("Repeat check content and url");
				}
				if (!empty($chk_title) && empty($chk_content) && empty($chk_url)) {
					$repeat_condition = !empty($post_title);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p "
						. "WHERE p.post_title = %s "
						. "	AND p.post_type = %s "
						. "	AND p.post_status <> 'trash'", $post_title, $post_type);
					$this->write_log("Repeat check only title:" . $post_title);
				}
				if (!empty($chk_title) && empty($chk_content) && !empty($chk_url)) {
					$repeat_condition = !empty($post_title) && !empty($url);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta pm ON pm.post_id = p.ID "
						. "WHERE p.post_title = %s "
						. " AND pm.meta_value = %s AND pm.meta_key = '_scrape_original_url'"
						. "	AND p.post_type = %s "
						. "	AND p.post_status <> 'trash'", $post_title, $url, $post_type);
					$this->write_log("Repeat check title and url");
				}
				if (!empty($chk_title) && !empty($chk_content) && empty($chk_url)) {
					$repeat_condition = !empty($post_title) && !empty($original_html_content);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta pm ON pm.post_id = p.ID "
						. "WHERE p.post_title = %s "
						. " AND pm.meta_value = %s AND pm.meta_key = '_scrape_original_html_content'"
						. "	AND p.post_type = %s "
						. "	AND p.post_status <> 'trash'", $post_title, $original_html_content, $post_type);
					$this->write_log("Repeat check title and content");
				}
				if (!empty($chk_title) && !empty($chk_content) && !empty($chk_url)) {
					$repeat_condition = !empty($post_title) && !empty($original_html_content) && !empty($url);
					$unique_check_sql = $wpdb->prepare("SELECT ID "
						. "FROM $wpdb->posts p LEFT JOIN $wpdb->postmeta pm1 ON pm1.post_id = p.ID "
						. " LEFT JOIN $wpdb->postmeta pm2 ON pm2.post_id = p.ID "
						. "WHERE p.post_title = %s "
						. " AND pm1.meta_value = %s AND pm1.meta_key = '_scrape_original_html_content'"
						. " AND pm2.meta_value = %s AND pm2.meta_key = '_scrape_original_url'"
						. "	AND post_type = %s "
						. "	AND post_status <> 'trash'", $post_title, $original_html_content, $url, $post_type);
					$this->write_log("Repeat check title content and url");
				}

				$post_id = $wpdb->get_var($unique_check_sql);
				if (!empty($post_id)) {
					$ID = $post_id;

					if ($repeat_condition)
						$repeat_count++;

					if ($meta_vals['scrape_on_unique'][0] == "skip")
						return;
					$meta_vals_of_post = get_post_meta($ID);
					foreach ($meta_vals_of_post as $key => $value) {
						delete_post_meta($ID, $key);
					}
				}
			}

			if ($meta_vals['scrape_tags_type'][0] == 'xpath' && !empty($meta_vals['scrape_tags'][0])) {
				$node = $xpath->query($meta_vals['scrape_tags'][0]);
				$this->write_log("tag length: " . $node->length);
				if ($node->length) {
					if ($node->length > 1) {
						$post_tags = array();
						foreach ($node as $item) {
							$post_tags[] = trim($item->nodeValue);
						}
					} else {
						$post_tags = $node->item(0)->nodeValue;
						if (!empty($meta_vals['scrape_tags_regex_status'][0])) {
							$regex_finds = unserialize($meta_vals['scrape_tags_regex_finds'][0]);
							$regex_replaces = unserialize($meta_vals['scrape_tags_regex_replaces'][0]);
							$combined = array_combine($regex_finds, $regex_replaces);
							foreach ($combined as $regex => $replace) {
								$post_tags = preg_replace("/" . str_replace("/", "\/", $regex) . "/is", $replace, $post_tags);
							}
						}
					}
					$this->write_log("tags : ");
					$this->write_log($post_tags);
				} else {
					$this->write_log("URL: " . $url . " XPath: " . $meta_vals['scrape_tags'][0] . " returned empty for post tags", true);
					$post_tags = array();
				}
			} else {
				if (!empty($meta_vals['scrape_tags_custom'][0])) {
					$post_tags = $meta_vals['scrape_tags_custom'][0];
				} else {
					$post_tags = array();
				}
			}

			if (!is_array($post_tags) || count($post_tags) == 0) {
				$tag_separator = $meta_vals['scrape_tags_separator'][0];
				if ($tag_separator != "" && !empty($post_tags)) {
					$post_tags = str_replace("\xc2\xa0", ' ', $post_tags);
					$post_tags = explode($tag_separator, $post_tags);
					$post_tags = array_map("trim", $post_tags);
				}
			}

			$post_arr = array(
				'ID' => $ID,
				'post_author' => $post_author,
				'post_date' => date("Y-m-d H:i:s", strtotime($post_date)),
				'post_content' => trim($post_content),
				'post_title' => trim($post_title),
				'post_status' => $post_status,
				'comment_status' => $post_comment,
				'meta_input' => $meta_input,
				'post_type' => $post_type,
				'tags_input' => $post_tags,
				'filter' => false,
				'ping_status' => 'closed',
				'post_excerpt' => $post_excerpt
			);

			$post_category = array_map('intval', $post_category);

			if ($post_type == 'post') {
				$post_arr['post_category'] = $post_category;
			}

			kses_remove_filters();
			$new_id = wp_insert_post($post_arr, true);
			kses_init_filters();

			if (is_wp_error($new_id)) {
				$this->write_log("error occurred in wordpress post entry: " . $new_id->get_error_message() . " " . $new_id->get_error_code(), true);
				return;
			}
			update_post_meta($new_id, '_scrape_task_id', $meta_vals['scrape_task_id'][0]);
            if($is_facebook_page) {
                $url = str_replace(array("mbasic","story.php"),array("www","permalink.php"), $url);
            }
			update_post_meta($new_id, '_scrape_original_url', $url);
			update_post_meta($new_id, '_scrape_original_html_content', $original_html_content);

			$cmd = $ID ? "updated" : "inserted";
			$this->write_log("post $cmd with id: " . $new_id);

			if ($post_type != 'post') {
				$tax_term_array = array();
				foreach ($post_category as $cat_id) {
					$term = get_term($cat_id);
					$term_tax = $term->taxonomy;
					$tax_term_array[$term_tax][] = $cat_id;
				}
				foreach ($tax_term_array as $tax => $terms) {
					wp_set_object_terms($new_id, $terms, $tax);
				}
			}

			$featured_image_type = $meta_vals['scrape_featured_type'][0];
			if ($featured_image_type == 'xpath' && !empty($meta_vals['scrape_featured'][0])) {
				$node = $xpath->query($meta_vals['scrape_featured'][0]);
				if ($node->length) {
					$post_featured_img = trim($node->item(0)->nodeValue);
					if($is_amazon) {
                        $data_old_hires = trim($node->item(0)->parentNode->getAttribute('data-old-hires'));
                        if(!empty($data_old_hires)) {
                            $post_featured_img = preg_replace("/\._.*_/", "", $data_old_hires);
                        } else {
                            $data_a_dynamic_image = trim($node->item(0)->parentNode->getAttribute('data-a-dynamic-image'));
                            if(!empty($data_a_dynamic_image)) {
                                $post_featured_img = array_keys(json_decode($data_a_dynamic_image, true));
                                $post_featured_img = end($post_featured_img);
                            }
                        }
                    }
					$post_featured_img = $this->create_absolute_url($post_featured_img, $url, $html_base_url);
					$this->generate_featured_image($post_featured_img, $new_id);
				} else {
					$this->write_log("URL: " . $url . " XPath: " . $meta_vals['scrape_featured'][0] . " returned empty for thumbnail image", true);
				}
			} else if($featured_image_type == 'feed') {
                $this->generate_featured_image($rss_item['featured_image'], $new_id);
            } else if ($featured_image_type == 'gallery') {
				set_post_thumbnail($new_id, $meta_vals['scrape_featured_gallery'][0]);
			}

			if (array_key_exists('_product_image_gallery', $meta_input) && $post_type == 'product' && $woo_active) {
				$this->write_log('image gallery process starts for WooCommerce');
				$woo_img_xpath = $post_meta_values[array_search('_product_image_gallery', $post_meta_names)];
				$woo_img_xpath = $woo_img_xpath . "//img | " . $woo_img_xpath . "//a";
				$nodes = $xpath->query($woo_img_xpath);
				$this->write_log("Gallery images length is " . $nodes->length);

				$max_width = 0;
				$max_height = 0;
				$gallery_images = array();
				$product_gallery_ids = array();
				foreach ($nodes as $img) {
					$post_meta_index = array_search('_product_image_gallery', $post_meta_names);
					$attr = $post_meta_attributes[$post_meta_index];
					if (empty($attr)) {
						if ($img->nodeName == "img") {
							$attr = 'src';
						} else {
							$attr = 'href';
						}
					}
					$img_url = trim($img->getAttribute($attr));
					if(!empty($post_meta_regex_statuses[$post_meta_index])) {
						$regex_combined = array_combine($post_meta_regex_finds[$post_meta_index], $post_meta_regex_replaces[$post_meta_index]);
						foreach ($regex_combined as $find => $replace) {
							$this->write_log("custom field value before regex $img_url");
							$img_url = preg_replace("/" . str_replace("/", "\/", $find) . "/is", $replace, $img_url);
							$this->write_log("custom field value after regex $img_url");
						}
					}
					$img_abs_url = $this->create_absolute_url($img_url, $url, $html_base_url);
					$this->write_log($img_abs_url);
					$is_base64 = false;
					if (substr($img_abs_url, 0, 11) == 'data:image/') {
						$array_result = getimagesizefromstring(base64_decode(substr($img_abs_url, strpos($img_abs_url, 'base64') + 7)));
						$is_base64 = true;
					} else {
						$array_result = getimagesize($img_abs_url);
					}
					if ($array_result !== false) {
						$width = $array_result[0];
						$height = $array_result[1];
						if ($width > $max_width)
							$max_width = $width;
						if ($height > $max_height)
							$max_height = $height;

						$gallery_images[] = array(
							'width' => $width,
							'height' => $height,
							'url' => $img_abs_url,
							'is_base64' => $is_base64
						);
					} else {
						$this->write_log("Image size data could not be retrieved", true);
					}
				}

				$this->write_log("Max width found: " . $max_width . " Max height found: " . $max_height);
				foreach ($gallery_images as $gi) {
					if ($gi['is_base64']) {
						continue;
					}
					$old_url = $gi['url'];
					$width = $gi['width'];
					$height = $gi['height'];

					$offset = 0;
					$width_pos = array();

					while (strpos($old_url, strval($width), $offset) !== false) {
						$width_pos[] = strpos($old_url, strval($width), $offset);
						$offset = strpos($old_url, strval($width), $offset) + 1;
					}

					$offset = 0;
					$height_pos = array();

					while (strpos($old_url, strval($height), $offset) !== false) {
						$height_pos[] = strpos($old_url, strval($height), $offset);
						$offset = strpos($old_url, strval($height), $offset) + 1;
					}

					$min_distance = PHP_INT_MAX;
					$width_replace_pos = 0;
					$height_replace_pos = 0;
					foreach ($width_pos as $wr) {
						foreach ($height_pos as $hr) {
							$distance = abs($wr - $hr);
							if ($distance < $min_distance && $distance != 0) {
								$min_distance = $distance;
								$width_replace_pos = $wr;
								$height_replace_pos = $hr;
							}
						}
					}
					$min_pos = min($width_replace_pos, $height_replace_pos);
					$max_pos = max($width_replace_pos, $height_replace_pos);

					if ($min_pos != $max_pos) {
						$this->write_log("Different pos found not square");
						$new_url = substr($old_url, 0, $min_pos) .
							strval($max_width) .
							substr($old_url, $min_pos + strlen($width), $max_pos - ($min_pos + strlen($width))) .
							strval($max_height) .
							substr($old_url, $max_pos + strlen($height));
					} else if ($min_distance == PHP_INT_MAX && strpos($old_url, strval($width)) !== false) {
						$this->write_log("Same pos found square image");
						$new_url = substr($old_url, 0, strpos($old_url, strval($width))) .
							strval(max($max_width, $max_height)) .
							substr($old_url, strpos($old_url, strval($width)) + strlen($width));
					}

					$this->write_log("Old gallery image url: " . $old_url);
					$this->write_log("New gallery image url: " . $new_url);
					if($is_amazon) {
					    $new_url = preg_replace("/\._.*_/", "", $old_url);
                    }

					$pgi_id = $this->generate_featured_image($new_url, $new_id, false);
					if (!empty($pgi_id)) {
						$product_gallery_ids[] = $pgi_id;
					} else {
						$pgi_id = $this->generate_featured_image($old_url, $new_id, false);
						if (!empty($pgi_id)) {
							$product_gallery_ids[] = $pgi_id;
						}
					}
				}
				update_post_meta($new_id, '_product_image_gallery', implode(",", array_unique($product_gallery_ids)));
			}


			if (!empty($meta_vals['scrape_download_images'][0])) {
				if (!empty($meta_vals['scrape_allowhtml'][0])) {
					$new_html = $this->download_images_from_html_string($post_arr['post_content'], $new_id);
					kses_remove_filters();
					$new_id = wp_update_post(array(
						'ID' => $new_id,
						'post_content' => $new_html
					));
					kses_init_filters();
				} else {
					$temp_str = $this->convert_html_links($original_html_content, $url, $html_base_url);
					$this->download_images_from_html_string($temp_str, $new_id);
				}
			}

			if (!empty($meta_vals['scrape_template_status'][0])) {
				$post = get_post($new_id);
				$post_metas = get_post_meta($new_id);

				$template = $meta_vals['scrape_template'][0];
				$template = str_replace(
					array(
					"[scrape_title]",
					"[scrape_content]",
					"[scrape_date]",
					"[scrape_url]",
					"[scrape_gallery]",
					"[scrape_categories]",
					"[scrape_tags]",
					"[scrape_thumbnail]"
					), array(
					$post->post_title,
					$post->post_content,
					$post->post_date,
					$post_metas['_scrape_original_url'][0],
					"[gallery]",
					implode(",", wp_get_post_terms($new_id, get_post_taxonomies($new_id), array('fields' => 'names'))),
					implode(",", wp_get_post_tags($new_id, array('fields' => 'names'))),
					get_the_post_thumbnail($new_id)
					)
					, $template
				);

				preg_match_all('/\[scrape_meta name="([^"]*)"\]/', $template, $matches);


				$full_matches = $matches[0];
				$name_matches = $matches[1];
				if (!empty($full_matches)) {
					$combined = array_combine($name_matches, $full_matches);

					foreach ($combined as $meta_name => $template_string) {
						$val = get_post_meta($new_id, $meta_name, true);
						$template = str_replace($template_string, $val, $template);
					}
				}

				kses_remove_filters();
                wp_update_post(array(
					'ID' => $new_id,
					'post_content' => $template
				));
				kses_init_filters();
			}

			unset($doc);
			unset($xpath);
			unset($response);
		} else {
			$this->write_log($url . " http error. error message " . $response->get_error_message(), true);
		}
	}

	public function execute_scrape($post_id, $meta_vals, $start_time, $modify_time) {
		if ($meta_vals['scrape_type'][0] == 'single') {
			$this->single_scrape($meta_vals['scrape_url'][0], $meta_vals);
		} else if ($meta_vals['scrape_type'][0] == 'feed') {
			$this->feed_scrape($meta_vals['scrape_url'][0], $meta_vals, $start_time, $modify_time, $post_id);
		} else if ($meta_vals['scrape_type'][0] == 'list') {
			$number_of_posts = 0;
			$repeat_count = 0;

			$args = array(
				'timeout' => $meta_vals['scrape_timeout'][0],
				'sslverify' => false,
				'user-agent' => get_option('scrape_user_agent')
			);
			if (!empty($meta_vals['scrape_cookie_names'])) {
				$args['cookies'] = array_combine(
					array_values(unserialize($meta_vals['scrape_cookie_names'][0])), array_values(unserialize($meta_vals['scrape_cookie_values'][0]))
				);
			}
			if(!empty($meta_vals['scrape_last_url']) && $meta_vals['scrape_run_type'][0] == 'continue') {
			    $this->write_log("continues from last stopped url" . $meta_vals['scrape_last_url'][0]);
                $meta_vals['scrape_url'][0] = $meta_vals['scrape_last_url'][0];
            }

            $this->write_log("Serial scrape starts at URL:" . $meta_vals['scrape_url'][0]);

			$response = wp_remote_get($meta_vals['scrape_url'][0], $args);
            update_post_meta($post_id, 'scrape_last_url', $meta_vals['scrape_url'][0]);
			if (!isset($response->errors)) {
				$body = $response['body'];
				$body = trim($body);

				if (substr($body, 0, 3) == pack("CCC", 0xef, 0xbb, 0xbf)) {
					$body = substr($body, 3);
				}

				$charset = $this->detect_html_encoding_and_replace(wp_remote_retrieve_header($response, "Content-Type"), $body);
				$body_iconv = iconv($charset, "UTF-8//IGNORE", $body);

				$body_preg = '<?xml encoding="utf-8" ?>' . preg_replace(
						array(
						'/(<table([^>]+)?>([^<>]+)?)(?!<tbody([^>]+)?>)/',
						'/(<(?!(\/tbody))([^>]+)?>)(<\/table([^>]+)?>)/',
						"'<\s*script[^>]*[^/]>(.*?)<\s*/\s*script\s*>'is",
						"'<\s*script\s*>(.*?)<\s*/\s*script\s*>'is",
						"'<\s*noscript[^>]*[^/]>(.*?)<\s*/\s*noscript\s*>'is",
						"'<\s*noscript\s*>(.*?)<\s*/\s*noscript\s*>'is"
						), array(
						'$1<tbody>',
						'$1</tbody>$4',
						"",
						"",
						"",
						""), $body_iconv);

				$doc = new DOMDocument;
				$body_preg = mb_convert_encoding($body_preg, 'HTML-ENTITIES', 'UTF-8');
				@$doc->loadHTML($body_preg);

				$base = $doc->getElementsByTagName('base')->item(0);
				$html_base_url = null;
				if (!is_null($base)) {
					$html_base_url = $base->getAttribute('href');
				}

				$xpath = new DOMXPath($doc);

				unset($response);
				unset($body_preg);
				unset($body_iconv);
				unset($body);

				$next_buttons = (!empty($meta_vals['scrape_nextpage'][0]) ? $xpath->query($meta_vals['scrape_nextpage'][0]) : new DOMNodeList);

				$next_button = false;
				$is_facebook_page = false;
				$is_amazon = false;

				if(parse_url($meta_vals['scrape_url'][0], PHP_URL_HOST) == 'mbasic.facebook.com') {
				    $is_facebook_page = true;
                }

                if(preg_match("/(\/|\.)amazon\./", $meta_vals['scrape_url'][0])) {
				    $is_amazon = true;
                }

				foreach ($next_buttons as $btn) {
					$next_button_text = preg_replace("/\s+/", " ", $btn->textContent);
					if ($next_button_text == $meta_vals['scrape_nextpage_innerhtml'][0]) {
						$this->write_log("next page found");
						$next_button = $btn;
					}
				}

				$first_page = true;
				$scrape_page_no = 1;
				$ref_a_element = $xpath->query($meta_vals['scrape_listitem'][0])->item(0);
				if(is_null($ref_a_element)) {
				    $this->write_log("Reference a element not found URL:" .  $meta_vals['scrape_url'][0] . " XPath: " . $meta_vals['scrape_listitem'][0]);
				    return;
                }
				$ref_node_path = $ref_a_element->getNodePath();
				$ref_node_no_digits = preg_replace("/\[\d+\]/", "", $ref_node_path);
				$ref_a_children = array();
				foreach ($ref_a_element->childNodes as $node) {
					$ref_a_children[] = $node->nodeName;
				}


				unset($body);

				while ($next_button || $first_page) {
					$this->write_log("scraping page #" . $scrape_page_no);


					$all_links = $xpath->query("//a");
					if($is_facebook_page) {
                        $all_links = $xpath->query("//a[text()='".trim($ref_a_element->textContent)."']");
                    }
					$single_links = array();
					foreach ($all_links as $a_elem) {

						$parent_path = $a_elem->getNodePath();
						$parent_path_no_digits = preg_replace("/\[\d+\]/", "", $parent_path);
						if ($parent_path_no_digits == $ref_node_no_digits) {
							$children_node_names = array();
							foreach ($a_elem->childNodes as $node) {
								$children_node_names[] = $node->nodeName;
							}
							if ($ref_a_children === $children_node_names) {
								$single_links[] = $a_elem->getAttribute('href');
							}
						}
					}
					$single_links = array_unique($single_links);
					$this->write_log("number of links:" . count($single_links));
					unset($all_links);
					foreach ($single_links as $k => $single_link) {

						if ($this->check_terminate($start_time, $modify_time, $post_id)) {
                            return "terminate";
                        }

						$this->single_scrape($this->create_absolute_url(
								$single_link, $meta_vals['scrape_url'][0], $html_base_url
							), $meta_vals, $repeat_count);

						if (!empty($meta_vals['scrape_waitpage'][0]))
							sleep($meta_vals['scrape_waitpage'][0]);
						$number_of_posts++;

						$this->write_log("number of posts: " . $number_of_posts);

						if (empty($meta_vals['scrape_post_unlimited'][0]) &&
							!empty($meta_vals['scrape_post_limit'][0]) && $number_of_posts == $meta_vals['scrape_post_limit'][0]) {
							$this->write_log("post limit count reached return.", true);
							return;
						}
						$this->write_log("repeat count: " . $repeat_count);
						if (!empty($meta_vals['scrape_finish_repeat']) && $repeat_count == $meta_vals['scrape_finish_repeat'][0]) {
							$this->write_log("$repeat_count repeated posts. returning", true);
							return;
						}
					}

					wp_cache_flush();

					$first_page = false;

					$next_button = false;
					foreach ($next_buttons as $btn) {
						$next_button_text = preg_replace("/\s+/", " ", $btn->textContent);
						if ($next_button_text == $meta_vals['scrape_nextpage_innerhtml'][0]) {
							$this->write_log("next page found");
							$next_button = $btn;
						}
					}

					if (!$next_button) {
						$this->write_log("next page element is empty. returning.", true);
						return;
					}



					$next_link = $this->create_absolute_url(
						$next_button->getAttribute('href'), $meta_vals['scrape_url'][0], $html_base_url
					);

					$this->write_log("next link is: " . $next_link);
					unset($response);
					$response = wp_remote_get($next_link, $args);
                    update_post_meta($post_id, 'scrape_last_url', $next_link);
					if (isset($response->errors)) {
						$this->write_log($post_id . " on error chosen stop. returning code " . $response->get_error_message(), true);
						return;
					}

					unset($body);
					$body = $response['body'];
					$body = trim($body);

					if (substr($body, 0, 3) == pack("CCC", 0xef, 0xbb, 0xbf)) {
						$body = substr($body, 3);
					}

					$charset = $this->detect_html_encoding_and_replace(wp_remote_retrieve_header($response, "Content-Type"), $body);
					$body_iconv = iconv($charset, "UTF-8//IGNORE", $body);

					$body_preg = '<?xml encoding="utf-8" ?>' . preg_replace(array(
							'/(<table([^>]+)?>([^<>]+)?)(?!<tbody([^>]+)?>)/',
							'/(<(?!(\/tbody))([^>]+)?>)(<\/table([^>]+)?>)/',
							"'<\s*script[^>]*[^/]>(.*?)<\s*/\s*script\s*>'is",
							"'<\s*script\s*>(.*?)<\s*/\s*script\s*>'is",
							"'<\s*noscript[^>]*[^/]>(.*?)<\s*/\s*noscript\s*>'is",
							"'<\s*noscript\s*>(.*?)<\s*/\s*noscript\s*>'is"
							), array('$1<tbody>',
							'$1</tbody>$4',
							"",
							"",
							"",
							""), $body_iconv);

					unset($doc);

					$doc = new DOMDocument;
					$body_preg = mb_convert_encoding($body_preg, 'HTML-ENTITIES', 'UTF-8');
					@$doc->loadHTML($body_preg);

					$base = $doc->getElementsByTagName('base')->item(0);
					$html_base_url = null;
					if (!is_null($base)) {
						$html_base_url = $base->getAttribute('href');
					}

					unset($xpath);
					$xpath = new DOMXPath($doc);


					$next_buttons = (!empty($meta_vals['scrape_nextpage'][0]) ? $xpath->query($meta_vals['scrape_nextpage'][0]) : new DOMNodeList);

					if (!($next_button)) {
						$this->write_log("exiting scraping loop URL: $next_link XPath:" . $meta_vals['scrape_nextpage'][0], true);
					} else {
						$this->write_log("next page URL: $next_link XPath: " . $meta_vals['scrape_nextpage'][0]);
					}

					$scrape_page_no++;
				}
			} else {
				$this->write_log($post_id . " http error in url " . $meta_vals['scrape_url'][0] . " : " . $response->get_error_message(), true);
				if ($meta_vals['scrape_onerror'][0] == 'stop') {
					$this->write_log($post_id . " on error chosen stop. returning code ", true);
					return;
				}
			}
		}
	}

	public static function clear_all_schedules() {
		$all_tasks = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'scrape',
			'post_status' => 'any'
		));

		foreach ($all_tasks as $task) {
			$post_id = $task->ID;
			$timestamp = wp_next_scheduled("scrape_event", array($post_id));
			wp_unschedule_event($timestamp, "scrape_event", array($post_id));
			wp_clear_scheduled_hook("scrape_event", array($post_id));

			wp_update_post(array(
				'ID' => $post_id,
				'post_date_gmt' => date("Y-m-d H:i:s")
			));
		}

		if (self::check_exec_works()) {
			exec('crontab -l', $output, $return);
			$command_string = '* * * * * wget -q -O - ' . site_url() . ' >/dev/null 2>&1' . PHP_EOL;
			if (!$return) {
				foreach ($output as $key => $line) {
					if ($line == $command_string) {
						unset($output[$key]);
					}
				}
			}
			$output = implode(PHP_EOL, $output);
			$cron_file = OL_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'scrape_cron_file.txt';
			file_put_contents($cron_file, $output);
			exec("crontab " . $cron_file);
		}
	}

	public static function create_system_cron($post_id) {

		if (!self::check_exec_works()) {
			set_transient("scrape_msg", array(__("Your system does not allow php exec function. Your cron type is saved as WordPress cron type.", "ol-scrapes")));
			self::write_log("cron error: exec() is disabled in system.", true);
			update_post_meta($post_id, 'scrape_cron_type', 'wordpress');
			return;
		}

		$cron_file = OL_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'scrape_cron_file.txt';
		touch($cron_file);
		chmod($cron_file, 0755);
		$command_string = '* * * * * wget -q -O - ' . site_url() . ' >/dev/null 2>&1';

		exec('crontab -l', $output, $return);
		$output = implode(PHP_EOL, $output);
		self::write_log("crontab -l result ");
		self::write_log($output);
		if (!$return) {
			if (strpos($output, $command_string) === false) {
				$command_string = $output . PHP_EOL . $command_string . PHP_EOL;

				file_put_contents($cron_file, $command_string);

				$command = 'crontab ' . $cron_file;
				$output = $return = null;
				exec($command, $output, $return);

				self::write_log($output);
				if ($return) {
					set_transient("scrape_msg", array(__("System error occurred during crontab installation. Your cron type is saved as WordPress cron type.", "ol-scrapes")));
					update_post_meta($post_id, 'scrape_cron_type', 'wordpress');
				}
			}
		} else {
			set_transient("scrape_msg", array(__("System error occurred while getting your cron jobs. Your cron type is saved as WordPress cron type.", "ol-scrapes")));
			update_post_meta($post_id, 'scrape_cron_type', 'wordpress');
		}
	}

	public function clear_all_tasks() {
		$all_tasks = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'scrape',
			'post_status' => 'any'
		));

		foreach ($all_tasks as $task) {
			$meta_vals = get_post_meta($task->ID);
			foreach ($meta_vals as $key => $value) {
				delete_post_meta($task->ID, $key);
			}
			wp_delete_post($task->ID, true);
		}
	}

	public function clear_all_values() {
		delete_option('scrape_plugin_activation_error');
		delete_option('scrape_user_agent');
		delete_option("scrapes_valid");
		delete_option("scrapes_code");
		delete_option("scrapes_domain");
		delete_transient("scrape_msg");
		delete_transient("scrape_msg_req");
		delete_transient("scrape_msg_set");
		delete_transient("scrape_msg_set_success");
	}

	public function check_warnings() {
		$message = "";
		if (!@set_time_limit(60)) {
			$message .= __("PHP set_time_limit function is not working.");
			if (function_exists("ini_get")) {
				$max_exec_time = ini_get('max_execution_time');
				$message .= sprintf(__("Your scrapes can only works for %s seconds"), $max_exec_time);
			}
		}
		if (defined("DISABLE_WP_CRON") && DISABLE_WP_CRON) {
			$message .= __("DISABLE_WP_CRON is probably set true in wp-config.php.<br/>Please delete or set it to false, or make sure that you ping wp-cron.php automatically.");
		}
		if (!empty($message)) {
			set_transient("scrape_msg", array($message));
		}
	}

	public static function activate_plugin() {

		$all_tasks = get_posts(array(
			'numberposts' => -1,
			'post_type' => 'scrape',
			'post_status' => 'publish'
		));

		foreach ($all_tasks as $task) {
			self::handle_cron_job($task->ID, $task);
		}

		self::write_log(self::system_info());
	}

	public static function deactivate_plugin() {
		self::clear_all_schedules();
	}

	public function detect_html_encoding_and_replace($header, &$body) {
		$charset_regex = preg_match("/<meta(?!\s*(?:name|value)\s*=)(?:[^>]*?content\s*=[\s\"']*)?([^>]*?)[\s\"';]*charset\s*=[\s\"']*([^\s\"'\/>]*)[\s\"']*\/?>/i", $body, $matches);
		if (empty($header)) {
			$charset_header = false;
		} else {
			$charset_header = explode(";", $header);
			if (count($charset_header) == 2) {
				$charset_header = $charset_header[1];
				$charset_header = explode("=", $charset_header);
				$charset_header = strtolower(trim($charset_header[1]));
			} else {
				$charset_header = false;
			}
		}
		if ($charset_regex) {
			$charset_meta = strtolower($matches[2]);
			if ($charset_meta != "utf-8") {
				$body = str_replace($matches[0], "<meta charset='utf-8'>", $body);
			}
		} else {
			$charset_meta = false;
		}

		$charset_php = strtolower(mb_detect_encoding($body, mb_list_encodings(), false));

		if ($charset_header && $charset_meta) {
			return $charset_header;
		}

		if (!$charset_header && !$charset_meta) {
			return $charset_php;
		} else {
			return !empty($charset_meta) ? $charset_meta : $charset_header;
		}
	}

	public function detect_feed_encoding_and_replace($header, &$body) {
	    $encoding_regex = preg_match("/encoding\s*=\s*[\"']([^\"']*)\s*[\"']/i", $body, $matches);
        if (empty($header)) {
            $charset_header = false;
        } else {
            $charset_header = explode(";", $header);
            if (count($charset_header) == 2) {
                $charset_header = $charset_header[1];
                $charset_header = explode("=", $charset_header);
                $charset_header = strtolower(trim($charset_header[1]));
            } else {
                $charset_header = false;
            }
        }
        if ($encoding_regex) {
            $charset_xml = strtolower($matches[1]);
            if ($charset_xml != "utf-8") {
                $body = str_replace($matches[1], 'utf-8', $body);
            }
        } else {
            $charset_xml = false;
        }

        $charset_php = strtolower(mb_detect_encoding($body, mb_list_encodings(), false));

        if ($charset_header && $charset_xml) {
            return $charset_header;
        }

        if (!$charset_header && !$charset_xml) {
            return $charset_php;
        } else {
            return !empty($charset_xml) ? $charset_xml : $charset_header;
        }
    }

	public function generate_featured_image($image_url, $post_id, $featured = true) {
		$this->write_log($image_url . " thumbnail controls");
		$meta_vals = get_post_meta($post_id);
		$upload_dir = wp_upload_dir();

		$filename = md5($image_url);

		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE post_title LIKE '" . $filename . "%' and post_type ='attachment' and post_parent = $post_id";
		$image_id = $wpdb->get_var($query);

		$this->write_log("found image id for $post_id : " . $image_id);

		if (empty($image_id)) {
			if (wp_mkdir_p($upload_dir['path'])) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}

			if (substr($image_url, 0, 11) == 'data:image/') {
				$image_data = array(
					'body' => base64_decode(substr($image_url, strpos($image_url, 'base64') + 7))
				);
			} else {
				$args = array(
					'timeout' => 30,
					'sslverify' => false,
					'user-agent' => get_option('scrape_user_agent')
				);

				if (!empty($meta_vals['scrape_cookie_names'])) {
					$args['cookies'] = array_combine(
						array_values(unserialize($meta_vals['scrape_cookie_names'][0])), array_values(unserialize($meta_vals['scrape_cookie_values'][0]))
					);
				}

				$image_data = wp_remote_get($image_url, $args);
				if (is_wp_error($image_data)) {
					$this->write_log("http error in " . $image_url . " " . $image_data->get_error_message(), true);
					return;
				}
			}

			$mimetype = getimagesizefromstring($image_data['body']);
			if ($mimetype === false) {
			    $this->write_log("mime type of image can not be found");
				return;
			}

			$mimetype = $mimetype["mime"];
			$extension = substr($mimetype, strpos($mimetype, "/") + 1);
			$file .= ".$extension";

			file_put_contents($file, $image_data['body']);


			$attachment = array(
				'post_mime_type' => $mimetype,
				'post_title' => $filename . ".$extension",
				'post_content' => '',
				'post_status' => 'inherit'
			);

			$attach_id = wp_insert_attachment($attachment, $file, $post_id);

			$this->write_log("attachment id : " . $attach_id . " mime type: " . $mimetype . " added to media library.");

			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$attach_data = wp_generate_attachment_metadata($attach_id, $file);
			wp_update_attachment_metadata($attach_id, $attach_data);
			if ($featured) {
				set_post_thumbnail($post_id, $attach_id);
			}

			unset($attach_data);
			unset($image_data);
			unset($mimetype);
			return $attach_id;
		} else if ($featured) {
			$this->write_log("image already exists set thumbnail for post " . $post_id . " to " . $image_id);
			set_post_thumbnail($post_id, $image_id);
		}
		return $image_id;
	}

	public function create_absolute_url($rel, $base, $html_base) {

		if (substr($rel, 0, 11) == 'data:image/') {
			return $rel;
		}

		if (!is_null($html_base)) {
			$base = $html_base;
		}
		return WP_Http::make_absolute_url($rel, $base);
	}

	public static function write_log($message, $is_error = false) {
		$folder = plugin_dir_path(__FILE__) . "../logs";
		$handle = fopen($folder . DIRECTORY_SEPARATOR . "logs.txt", "a");
		if (is_object($message) || is_array($message) || is_bool($message)) {
			$message = json_encode($message);
		}
		if ($is_error) {
			$message = PHP_EOL . " === Scrapes Warning === " . PHP_EOL . $message . PHP_EOL . " === Scrapes Warning === ";
		}
		fwrite($handle, current_time('mysql') . " TASK ID: " . self::$task_id . " - PID: " . getmypid() . " - RAM: " . (round(memory_get_usage() / (1024 * 1024), 2)) . "MB - " . $message . PHP_EOL);
		if ((filesize($folder . DIRECTORY_SEPARATOR . "logs.txt") / 1024 / 1024) >= 10) {
			fclose($handle);
			unlink($folder . DIRECTORY_SEPARATOR . "logs.txt");
			$handle = fopen($folder . DIRECTORY_SEPARATOR . "logs.txt", "a");
			fwrite($handle, current_time('mysql') . " - " . getmypid() . " - " . self::system_info() . PHP_EOL);
		}
		fclose($handle);
	}

	public static function system_info() {
		global $wpdb;

		if (!function_exists('get_plugins')) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$system_info = "";
		$system_info .= "Website Name: " . get_bloginfo() . PHP_EOL;
		$system_info .= "Wordpress URL: " . site_url() . PHP_EOL;
		$system_info .= "Site URL: " . home_url() . PHP_EOL;
		$system_info .= "Wordpress Version: " . get_bloginfo('version') . PHP_EOL;
		$system_info .= "Multisite: " . (is_multisite() ? "yes" : "no") . PHP_EOL;
		$system_info .= "Theme: " . wp_get_theme() . PHP_EOL;
		$system_info .= "PHP Version: " . phpversion() . PHP_EOL;
		$system_info .= "PHP Extensions: " . json_encode(get_loaded_extensions()) . PHP_EOL;
		$system_info .= "MySQL Version: " . $wpdb->db_version() . PHP_EOL;
		$system_info .= "Server Info: " . $_SERVER['SERVER_SOFTWARE'] . PHP_EOL;
		$system_info .= "WP Memory Limit: " . WP_MEMORY_LIMIT . PHP_EOL;
		$system_info .= "WP Admin Memory Limit: " . WP_MAX_MEMORY_LIMIT . PHP_EOL;
		$system_info .= "PHP Memory Limit: " . ini_get('memory_limit') . PHP_EOL;
		$system_info .= "Wordpress Plugins: " . json_encode(get_plugins()) . PHP_EOL;
		$system_info .= "Wordpress Active Plugins: " . json_encode(get_option('active_plugins')) . PHP_EOL;
		return $system_info;
	}

	public function requirements_check() {
        load_plugin_textdomain('ol-scrapes', false,  dirname(plugin_basename(__FILE__)) .'/../languages');
		$min_wp = '3.5';
		$min_php = '5.2.4';
		$exts = array('dom', 'mbstring', 'iconv', 'json', 'simplexml');

		$errors = array();

		if (version_compare(get_bloginfo('version'), $min_wp, '<')) {
			$errors[] = __("Your WordPress version is below 3.5. Please update.", "ol-scrapes");
		}

		if (version_compare(PHP_VERSION, $min_php, '<')) {
			$errors[] = __("PHP version is below 5.2.4. Please update.", "ol-scrapes");
		}

		foreach ($exts as $ext) {
			if (!extension_loaded($ext)) {
				$errors[] = sprintf(__("PHP extension %s is not loaded. Please contact your server administrator or visit http://php.net/manual/en/%s.installation.php for installation.", "ol-scrapes"), $ext, $ext);
			}
		}

		$folder = plugin_dir_path(__FILE__) . "../logs";

		if (!is_dir($folder) && mkdir($folder, 0755) === false) {
			$errors[] = sprintf(__("%s folder is not writable. Please update permissions for this folder to chmod 755.", "ol-scrapes"), $folder);
		}

		if (fopen($folder . DIRECTORY_SEPARATOR . "logs.txt", "a") === false) {
			$errors[] = sprintf(__("%s folder is not writable therefore logs.txt file could not be created. Please update permissions for this folder to chmod 755.", "ol-scrapes"), $folder);
		}

		return $errors;
	}

	public static function disable_plugin() {
		if (current_user_can('activate_plugins') && is_plugin_active(plugin_basename(OL_PLUGIN_PATH . 'ol_scrapes.php'))) {
			deactivate_plugins(plugin_basename(OL_PLUGIN_PATH . 'ol_scrapes.php'));
			if (isset($_GET['activate'])) {
				unset($_GET['activate']);
			}
		}
	}

	public static function show_notice() {
        load_plugin_textdomain('ol-scrapes', false,  dirname(plugin_basename(__FILE__)) .'/../languages');
		$msgs = get_transient("scrape_msg");
		if (!empty($msgs)) :
			foreach ($msgs as $msg) :
				?>
				<div class="notice notice-error">
						<p><strong>Scrapes: </strong><?php echo $msg; ?> <a href="<?php echo add_query_arg('post_type', 'scrape', admin_url('edit.php')); ?>"><?php _e("View All Scrapes", "ol-scrapes"); ?></a>.</p>
				</div>
				<?php
			endforeach;
		endif;

		$msgs = get_transient("scrape_msg_req");
		if (!empty($msgs)) :
			foreach ($msgs as $msg) :
				?>
				<div class="notice notice-error">
						<p><strong>Scrapes: </strong><?php echo $msg; ?></p>
				</div>
				<?php
			endforeach;
		endif;

		$msgs = get_transient("scrape_msg_set");
		if (!empty($msgs)) :
			foreach ($msgs as $msg) :
				?>
				<div class="notice notice-error">
						<p><strong>Scrapes: </strong><?php echo $msg; ?></p>
				</div>
				<?php
			endforeach;
		endif;

		$msgs = get_transient("scrape_msg_set_success");
		if (!empty($msgs)) :
			foreach ($msgs as $msg) :
				?>
				<div class="notice notice-success">
						<p><strong>Scrapes: </strong><?php echo $msg; ?></p>
				</div>
				<?php
			endforeach;
		endif;

		delete_transient("scrape_msg");
		delete_transient("scrape_msg_req");
		delete_transient("scrape_msg_set");
		delete_transient("scrape_msg_set_success");
	}

	public function custom_column() {
		add_filter('manage_' . 'scrape' . '_posts_columns', array($this, 'add_status_column'));
		add_action('manage_' . 'scrape' . '_posts_custom_column', array($this, 'show_status_column'), 10, 2);
		add_filter('post_row_actions', array($this, 'remove_row_actions'), 10, 2);
	}

	public function custom_start_stop_action() {
		add_action('load-edit.php', array($this, 'scrape_custom_actions'));
	}

	public function scrape_custom_actions() {
		$nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : null;
		$action = isset($_REQUEST['scrape_action']) ? $_REQUEST['scrape_action'] : null;
		$post_id = isset($_REQUEST['scrape_id']) ? $_REQUEST['scrape_id'] : null;
		if (wp_verify_nonce($nonce, 'scrape_custom_action') && isset($post_id)) {

			if ($action == 'stop_scrape') {
				$my_post = array();
				$my_post['ID'] = $_REQUEST['scrape_id'];
				$my_post['post_date_gmt'] = date("Y-m-d H:i:s");
				wp_update_post($my_post);
			} else if ($action == 'start_scrape') {
				update_post_meta($post_id, 'scrape_workstatus', 'waiting');
				update_post_meta($post_id, 'scrape_run_count', 0);
				update_post_meta($post_id, 'scrape_start_time', '');
				update_post_meta($post_id, 'scrape_end_time', '');
				update_post_meta($post_id, 'scrape_task_id', $post_id);
				$this->handle_cron_job($_REQUEST['scrape_id']);
			} else if ($action == 'duplicate_scrape') {
				$post = get_post($post_id, ARRAY_A);
				$post['ID'] = 0;
				$insert_id = wp_insert_post($post);
				$post_meta = get_post_meta($post_id);
				foreach ($post_meta as $name => $value) {
					update_post_meta($insert_id, $name, get_post_meta($post_id, $name, true));
				}
				update_post_meta($insert_id, 'scrape_workstatus', 'waiting');
				update_post_meta($insert_id, 'scrape_run_count', 0);
				update_post_meta($insert_id, 'scrape_start_time', '');
				update_post_meta($insert_id, 'scrape_end_time', '');
				update_post_meta($insert_id, 'scrape_task_id', $insert_id);
			}
			wp_redirect(add_query_arg('post_type', 'scrape', admin_url('/edit.php')));
			exit;
		}
	}

	public function remove_row_actions($actions, $post) {
		if ($post->post_type == 'scrape') {
			unset($actions);
			return array(
				'' => ''
			);
		}
		return $actions;
	}

	public function add_status_column($columns) {
		unset($columns['title']);
		unset($columns['date']);

		$columns['name'] = __('Name', "ol-scrapes");
		$columns['status'] = __('Status', "ol-scrapes");
		$columns['schedules'] = __('Schedules', "ol-scrapes");
		$columns['actions'] = __('Actions', "ol-scrapes");
		if (isset($_GET['scrape_debug'])) {
			$columns['debug'] = 'Debug';
		}
		return $columns;
	}

	public function show_status_column($column_name, $post_ID) {
		clean_post_cache($post_ID);
		$post_status = get_post_status($post_ID);
		$post_title = get_post_field('post_title', $post_ID);
		$scrape_status = get_post_meta($post_ID, 'scrape_workstatus', true);
		$run_limit = get_post_meta($post_ID, 'scrape_run_limit', true);
		$run_count = get_post_meta($post_ID, 'scrape_run_count', true);
		$run_unlimited = get_post_meta($post_ID, 'scrape_run_unlimited', true);
		$css_class = '';

		if ($post_status == 'trash') {
			$status = __("Deactivated", "ol-scrapes");
			$css_class = "deactivated";
		} else if ($run_count == 0 && $scrape_status == 'waiting') {
			$status = __("Preparing", "ol-scrapes");
			$css_class = "preparing";
		} else if ((!empty($run_unlimited) || $run_count < $run_limit) && $scrape_status == 'waiting') {
			$status = __("Waiting next run", "ol-scrapes");
			$css_class = "wait_next";
		} else if (((!empty($run_limit) && $run_count < $run_limit) || (!empty($run_unlimited))) && $scrape_status == 'running') {
			$status = __("Running", "ol-scrapes");
			$css_class = "running";
		} else if (empty($run_unlimited) && $run_count == $run_limit && $scrape_status == 'waiting') {
			$status = __("Complete", "ol-scrapes");
			$css_class = "complete";
		}

		if ($column_name == 'status') {
			echo "<span class='ol_status ol_status_$css_class'>" . $status . "</span>";
		}

		if ($column_name == 'name') {
			echo
			"<p><strong><a href='" . get_edit_post_link($post_ID) . "'>" . $post_title . "</a><strong></p>" .
			"<p><span class='id'>ID: " . $post_ID . "</span></p>";
		}

		if ($column_name == 'schedules') {
			$last_run = get_post_meta($post_ID, 'scrape_start_time', true) != "" ? get_post_meta($post_ID, 'scrape_start_time', true) : __("None", "ol-scrapes");
			$last_complete = get_post_meta($post_ID, 'scrape_end_time', true) != "" ? get_post_meta($post_ID, 'scrape_end_time', true) : __("None", "ol-scrapes");
			$run_count_progress = $run_count;
			if ($run_unlimited == "") {
				$run_count_progress .= " / " . $run_limit;
			}

			$offset = get_option('gmt_offset') * 3600;
			$date = date("Y-m-d H:i:s", wp_next_scheduled("scrape_event", array($post_ID)) + $offset);
			if (strpos($date, "1970-01-01") !== false) {
				$date = __("No Schedule", "ol-scrapes");
			}
			echo
			"<p><label>".__("Last Run:" , "ol-scrapes") ."</label> <span>" . $last_run . "</span></p>" .
			"<p><label>".__("Last Complete:" , "ol-scrapes") ."</label> <span>" . $last_complete . "</span></p>" .
			"<p><label>".__("Next Run:" , "ol-scrapes") ."</label> <span>" . $date . "</span></p>" .
			"<p><label>".__("Total Run:" , "ol-scrapes") ."</label> <span>" . $run_count_progress . "</span></p>";
		}
		if ($column_name == "actions") {
			$nonce = wp_create_nonce('scrape_custom_action');
			$untrash = wp_create_nonce('untrash-post_' . $post_ID);
			echo
			($post_status != 'trash' ? "<a href='" . get_edit_post_link($post_ID) . "' class='button edit'><i class='icon ion-android-create'></i>" . __("Edit", "ol-scrapes") . "</a>" : "" ) .
			($post_status != 'trash' ? "<a href='" . admin_url("edit.php?post_type=scrape&scrape_id=$post_ID&_wpnonce=$nonce&scrape_action=start_scrape") . "' class='button run ol_status_" . $css_class . "'><i class='icon ion-play'></i>" . __("Run", "ol-scrapes") . "</a>" : "") .
			($post_status != 'trash' ? "<a href='" . admin_url("edit.php?post_type=scrape&scrape_id=$post_ID&_wpnonce=$nonce&scrape_action=stop_scrape") . "' class='button stop ol_status_" . $css_class . "'><i class='icon ion-pause'></i>" . __("Pause", "ol-scrapes") . "</a>" : "") .
			($post_status != 'trash' ? "<br><a href='" . admin_url("edit.php?post_type=scrape&scrape_id=$post_ID&_wpnonce=$nonce&scrape_action=duplicate_scrape") . "' class='button duplicate'><i class='icon ion-android-add-circle'></i>" . __("Copy", "ol-scrapes") . "</a>" : "" ) .
			($post_status != 'trash' ? "<a href='" . get_delete_post_link($post_ID) . "' class='button trash'><i class='icon ion-trash-b'></i>" . __("Trash", "ol-scrapes") . "</a>" :
				"<a href='" . admin_url('post.php?post=' . $post_ID . '&action=untrash&_wpnonce=' . $untrash) . "' class='button restore'><i class='icon ion-forward'></i>" . __("Restore", "ol-scrapes") . "</a>");
		}

		if ($column_name == "debug") {
			echo var_export(get_post_meta($post_ID));
			echo var_export(get_post($post_ID));
		}
	}

	public function convert_readable_html($html_string) {

		require_once "class-readability.php";

		$readability = new Readability($html_string);
		$readability->debug = false;
		$readability->convertLinksToFootnotes = false;
		$result = $readability->init();
		if ($result) {
			$content = $readability->getContent()->innerHTML;
			if (function_exists('tidy_parse_string')) {
				$tidy = tidy_parse_string($content, array('indent' => true, 'show-body-only' => true), 'UTF8');
				$tidy->cleanRepair();
				$content = $tidy->value;
			}
			return $content;
		} else {
			return '';
		}
	}

	public function feed_scrape($url, $meta_vals, $start_time, $modify_time, $task_id) {
		$this->write_log("rss scrape started " . $url);
		$number_of_posts = 0;
		$repeat_count = 0;

		$args = array(
			'timeout' => $meta_vals['scrape_timeout'][0],
			'sslverify' => false,
			'user-agent' => get_option('scrape_user_agent')
		);
		$response = wp_remote_get($url, $args);

		if (!isset($response->errors)) {
			libxml_use_internal_errors(true);
			$body = $response['body'];
			$charset = $this->detect_feed_encoding_and_replace(wp_remote_retrieve_header($response, "Content-Type"), $body);
			$body = iconv($charset, "UTF-8//IGNORE", $body);
			if($body === false) {
			    $this->write_log("UTF8 Convert error from charset:" . $charset);
            }
			$xml = simplexml_load_string($body);
			if ($xml === false) {
				$this->write_log(libxml_get_errors(), true);
				libxml_clear_errors();
			}

			$namespaces = $xml->getNamespaces(true);

			$feed_type = $xml->getName();

			$ID = 0;

			$feed_image = '';
			if ($feed_type == 'rss') {
				$items = $xml->channel->item;
				if (isset($xml->channel->image)) {
					$feed_image = $xml->channel->image->url;
				}
			} else if ($feed_type == 'feed') {
				$items = $xml->entry;
				$feed_image = (!empty($xml->logo) ? $xml->logo : $xml->icon);
			} else if ($feed_type == 'RDF') {
				$items = $xml->item;
				$feed_image = $xml->channel->image->attributes($namespaces['rdf'])->resource;
			}

			foreach ($items as $item) {

                if ($this->check_terminate($start_time, $modify_time, $task_id)) {
                    return "terminate";
                }


                $post_date = '';
                if ($feed_type == 'rss') {
                    $post_date = $item->pubDate;
                } else if ($feed_type == 'feed') {
                    $post_date = $item->published;
                } else if ($feed_type == 'RDF') {
                    $post_date = $item->children($namespaces['dc'])->date;
                }

                $post_date = date('Y-m-d H:i:s', strtotime($post_date));

                if ($feed_type != 'feed') {
                    $post_content = html_entity_decode($item->description);
                    $original_html_content = $post_content;
                } else {
                    $post_content = html_entity_decode($item->content);
                    $original_html_content = $post_content;
                }

                if ($meta_vals['scrape_allowhtml'][0] != 'on') {
                    $post_content = wp_strip_all_tags($post_content);
                }

                $post_content = trim($post_content);

                $mime_types = get_allowed_mime_types();
                if (isset($namespaces['media'])) {
                    $media = $item->children($namespaces['media']);
                } else {
                    $media = $item->children();
                }

                if (isset($media->content) && $feed_type != 'feed') {
                    $this->write_log("image from media:content");
                    $type = (string) $media->content->attributes()->type;
                    $url = (string) $media->content->attributes()->url;
                    $featured_image_url = $url;
                } else if (isset($media->thumbnail)) {
                    $this->write_log("image from media:thumbnail");
                    $url = (string) $media->thumbnail->attributes()->url;
                    $featured_image_url = $url;
                } else if (isset($item->enclosure)) {
                    $this->write_log("image from enclosure");
                    $type = (string) $item->enclosure['type'];
                    $url = (string) $item->enclosure['url'];
                    $featured_image_url = $url;
                } else if (
                    isset($item->description) ||
                    (isset($item->content) && $feed_type == 'feed')) {
                    $item_content = (isset($item->description) ? $item->description : $item->content);
                    $this->write_log("image from description");
                    $doc = new DOMDocument();
                    @$doc->loadHTML('<?xml encoding="utf-8" ?>' . html_entity_decode($item_content));

                    $imgs = $doc->getElementsByTagName('img');

                    if ($imgs->length) {
                        $featured_image_url = $imgs->item(0)->attributes->getNamedItem('src')->nodeValue;
                    }
                } else if (!empty($feed_image)) {
                    $this->write_log("image from channel");
                    $featured_image_url = $feed_image;
                }

                $rss_item = array(
                    'post_date' => strval($post_date),
                    'post_content' => strval($post_content),
                    'post_original_content' => $original_html_content,
                    'featured_image' => strval($featured_image_url),
                    'post_title' => strval($item->title)
                );
                if ($feed_type == 'feed') {
                    $this->single_scrape(strval($item->link["href"]), $meta_vals, $repeat_count, $rss_item);
                } else {
                    $this->single_scrape(strval($item->link), $meta_vals, $repeat_count, $rss_item);
                }


                if (!empty($meta_vals['scrape_waitpage'][0]))
                    sleep($meta_vals['scrape_waitpage'][0]);
                $number_of_posts++;

                $this->write_log("number of posts: " . $number_of_posts);

                if (empty($meta_vals['scrape_post_unlimited'][0]) &&
                    !empty($meta_vals['scrape_post_limit'][0]) && $number_of_posts == $meta_vals['scrape_post_limit'][0]) {
                    $this->write_log("post limit count reached return.", true);
                    return;
                }
                $this->write_log("repeat count: " . $repeat_count);
                if (!empty($meta_vals['scrape_finish_repeat']) && $repeat_count == $meta_vals['scrape_finish_repeat'][0]) {
                    $this->write_log("$repeat_count repeated posts. returning", true);
                    return;
                }

			}
		} else {
			$this->write_log($task_id . " http error:" . $response->get_error_message());
			if ($meta_vals['scrape_onerror'][0] == 'stop') {
				$this->write_log($task_id . " on error chosen stop. returning code " . $response->get_error_message(), true);
				return;
			}
		}
	}

	public function remove_publish() {
		add_action('admin_menu', array($this, 'remove_other_metaboxes'));
		add_filter('get_user_option_screen_layout_' . 'scrape', array($this, 'screen_layout_post'));
	}

	public function remove_other_metaboxes() {
		remove_meta_box('submitdiv', 'scrape', 'side');
		remove_meta_box('slugdiv', 'scrape', 'normal');
		remove_meta_box('postcustom', 'scrape', 'normal');
	}

	public function screen_layout_post() {
		add_filter('screen_options_show_screen', '__return_false');
		return 1;
	}

	public function convert_html_links($html_string, $base_url, $html_base_url) {
		if (empty($html_string)) {
			return "";
		}
		$doc = new DOMDocument();
		@$doc->loadHTML('<?xml encoding="utf-8" ?>' . $html_string);
		$imgs = $doc->getElementsByTagName('img');
		if ($imgs->length) {
			foreach ($imgs as $item) {
				$item->setAttribute('src', $this->create_absolute_url($item->getAttribute('src'), $base_url, $html_base_url));
			}
		}
		$a = $doc->getElementsByTagName('a');
		if ($a->length) {
			foreach ($a as $item) {
				$item->setAttribute('href', $this->create_absolute_url($item->getAttribute('href'), $base_url, $html_base_url));
			}
		}
		$doc->removeChild($doc->doctype);
		$doc->removeChild($doc->firstChild);
		$doc->replaceChild($doc->firstChild->firstChild->firstChild, $doc->firstChild);
		return $doc->saveHTML();
	}

	public function convert_str_to_woo_decimal($money) {
		$decimal_separator = stripslashes(get_option('woocommerce_price_decimal_sep'));
		$thousand_separator = stripslashes(get_option('woocommerce_price_thousand_sep'));

		$money = preg_replace("/[^\d\.,]/", '', $money);
		$money = str_replace($thousand_separator, '', $money);
		$money = str_replace($decimal_separator, '.', $money);
		return $money;
	}

	public function download_images_from_html_string($html_string, $post_id) {
		if (empty($html_string)) {
			return "";
		}
		$doc = new DOMDocument();
		@$doc->loadHTML('<?xml encoding="utf-8" ?><div>' . $html_string . '</div>');
		$imgs = $doc->getElementsByTagName('img');
		if ($imgs->length) {
			foreach ($imgs as $item) {

				$image_url = $item->getAttribute('src');

				global $wpdb;
				$query = "SELECT ID FROM {$wpdb->posts} WHERE post_title LIKE '" . md5($image_url) . "%' and post_type ='attachment' and post_parent = $post_id";
				$count = $wpdb->get_var($query);

				$this->write_log("download image id for post $post_id is " . $count);

				if (empty($count)) {
					$attach_id = $this->generate_featured_image($image_url, $post_id, false);
					$item->setAttribute('src', wp_get_attachment_url($attach_id));
                    $item->removeAttribute('srcset');
                    $item->removeAttribute('sizes');
				} else {
					$item->setAttribute('src', wp_get_attachment_url($count));
                    $item->removeAttribute('srcset');
                    $item->removeAttribute('sizes');
				}
				unset($image_url);
			}
		}
		$doc->removeChild($doc->doctype);
		$doc->removeChild($doc->firstChild);
		$doc->replaceChild($doc->firstChild->firstChild->firstChild, $doc->firstChild);
		$str = $doc->saveHTML();
		unset($doc);
		return $str;
	}

	public function register_shutdown() {
		add_action('shutdown', array($this, 'shutdown_callback'));
	}

	public function shutdown_callback() {
		if (version_compare(PHP_VERSION, '5.2.0', '>=')) {
			$error = error_get_last();
			if ($error['type'] === E_ERROR || $error['type'] === E_RECOVERABLE_ERROR) {
				$this->write_log("SHUTDOWN ERROR!! : ", true);
				$this->write_log($error, true);
				if (self::$task_id) {
					$post_id = self::$task_id;
					$meta_vals = get_post_meta($post_id);
					update_post_meta($post_id, "scrape_run_count", $meta_vals['scrape_run_count'][0] + 1);
					update_post_meta($post_id, 'scrape_workstatus', 'waiting');
					update_post_meta($post_id, "scrape_end_time", current_time('mysql'));
					$this->write_log($post_id . " id task ended because of php fatal error.", true);
				}
			}
		}
	}

	public static function check_exec_works() {
		if (function_exists("exec")) {
			@exec('pwd', $output, $return);
			return $return == 0;
		} else {
			return false;
		}
	}

	public function check_terminate($start_time, $modify_time, $post_id) {
		clean_post_cache($post_id);

		if ($start_time != get_post_meta($post_id, "scrape_start_time", true) &&
			get_post_meta($post_id, 'scrape_stillworking', true) == 'terminate') {
			$this->write_log("if not completed in time terminate is selected. finishing this incomplete task.", true);
			return true;
		}

		if (get_post_status($post_id) == 'trash' || get_post_status($post_id) === false) {
			$this->write_log("post sent to trash or status read failure. remaining urls will not be scraped.", true);
			return true;
		}

		$check_modify_time = get_post_modified_time('U', null, $post_id);
		if ($modify_time != $check_modify_time && $check_modify_time !== false) {
			$this->write_log("post modified. remaining urls will not be scraped.", true);
			return true;
		}

		return false;
	}

	public function trimmed_templated_value($prefix, &$meta_vals, &$xpath, $post_date, $url, $meta_input, $rss_item = null) {
		$value = '';
		if (isset($meta_vals[$prefix]) || isset($meta_vals[$prefix . "_type"])) {
            if(isset($meta_vals[$prefix . "_type"]) && $meta_vals[$prefix . "_type"][0] == 'feed') {
                $value = $rss_item{'post_title'};
            } else {
                if(!empty($meta_vals[$prefix][0])) {
                    $node = $xpath->query($meta_vals[$prefix][0]);
                    if ($node->length) {
                        $value = $node->item(0)->nodeValue;
                        $this->write_log($prefix . " : " . $value);

                    } else {
                        $value = '';
                        $this->write_log("URL: " . $url . " XPath: " . $meta_vals[$prefix][0] . " returned empty for $prefix", true);
                    }
                } else {
                    $value = '';
                }
            }


			if (!empty($meta_vals[$prefix . '_regex_status'][0])) {
				$regex_finds = unserialize($meta_vals[$prefix . '_regex_finds'][0]);
				$regex_replaces = unserialize($meta_vals[$prefix . '_regex_replaces'][0]);
				$regex_combined = array();
				if (!empty($regex_finds)) {
					$regex_combined = array_combine($regex_finds, $regex_replaces);
					foreach ($regex_combined as $regex => $replace) {
						$this->write_log("$prefix before regex: " . $value);
						$value = preg_replace("/" . str_replace("/", "\/", $regex) . "/is", $replace, $value);
						$this->write_log("$prefix after regex: " . $value);
					}
				}
			}
		}
		if (isset($meta_vals[$prefix . '_template_status']) && !empty($meta_vals[$prefix . '_template_status'][0])) {
			$template = $meta_vals[$prefix . '_template'][0];
			$this->write_log($prefix . " : " . $template);
			$value = str_replace("[scrape_value]", $value, $template);
			$value = str_replace("[scrape_date]", $post_date, $value);
			$value = str_replace("[scrape_url]", $url, $value);

			preg_match_all('/\[scrape_meta name="([^"]*)"\]/', $value, $matches);

			$full_matches = $matches[0];
			$name_matches = $matches[1];
			if (!empty($full_matches)) {
				$combined = array_combine($name_matches, $full_matches);

				foreach ($combined as $meta_name => $template_string) {
					$val = $meta_input[$meta_name];
					$value = str_replace($template_string, $val, $value);
				}
			}
			$this->write_log("after template replacements: " . $value);
		}
		return trim($value);
	}

	public function translate_months($str) {
		$languages = array(
			"en" => array(
				"January",
				"February",
				"March",
				"April",
				"May",
				"June",
				"July",
				"August",
				"September",
				"October",
				"November",
				"December"
			),
			"de" => array(
				"Januar",
				"Februar",
				"März",
				"April",
				"Mai",
				"Juni",
				"Juli",
				"August",
				"September",
				"Oktober",
				"November",
				"Dezember"
			),
			"fr" => array(
				"Janvier",
				"Février",
				"Mars",
				"Avril",
				"Mai",
				"Juin",
				"Juillet",
				"Août",
				"Septembre",
				"Octobre",
				"Novembre",
				"Décembre"
			),
			"tr" => array(
				"Ocak",
				"Şubat",
				"Mart",
				"Nisan",
				"Mayıs",
				"Haziran",
				"Temmuz",
				"Ağustos",
				"Eylül",
				"Ekim",
				"Kasım",
				"Aralık"
			),
			"nl" => array(
				"Januari",
				"Februari",
				"Maart",
				"April",
				"Mei",
				"Juni",
				"Juli",
				"Augustus",
				"September",
				"Oktober",
				"November",
				"December"
			)
		);

		$languages_abbr = $languages;

		foreach ($languages_abbr as $locale => $months) {
			$languages_abbr[$locale] = array_map(array($this, 'month_abbr'), $months);
		}

		foreach ($languages as $locale => $months) {
			$str = str_ireplace($months, $languages["en"], $str);
		}
		foreach ($languages_abbr as $locale => $months) {
			$str = str_ireplace($months, $languages_abbr["en"], $str);
		}

		return $str;
	}

	public static function month_abbr($month) {
		return mb_substr($month, 0, 3);
	}

	public function settings_page() {
		add_action('admin_init', array($this, 'settings_page_functions'));
	}

	public function settings_page_functions() {
		add_action('admin_post_save_scrapes_settings', $this->settings);
		add_action('admin_post_remove_pc', $this->remove_pc);
	}

	public function template_calculator($str) {
	    $this->write_log("calc string" . $str);
        $fn = create_function("", "return ({$str});" );
        return $fn !== false ? $fn() : "";
    }

    public function add_translations() {
        add_action('plugins_loaded', array($this, 'load_translations'));
    }

    public function load_translations() {
        load_plugin_textdomain('ol-scrapes', false,  dirname(plugin_basename(__FILE__)) .'/../languages');
        global $translates;
        $translates = array(
            __("An error occurred while connecting to server. Please check your connection or try again later.", "ol-scrapes"),
            __("Purchase code is defined for another domain name before. Please provide another purchase code.", "ol-scrapes"),
            __("Purchase code is validated.", "ol-scrapes"),
            __("Purchase code is removed from settings.", "ol-scrapes"),
            'Purchase code is not approved by Envato. Please check your purchase code.' =>  __("Purchase code is not approved by Envato. Please check your purchase code.", "ol-scrapes"),
            'An error occurred while decoding Envato API results. Please try again later.' => __("An error occurred while decoding Envato API results. Please try again later.", "ol-scrapes"),
            'Purchase code is already exists. Please provide another purchase code.' => __("Purchase code is already exists. Please provide another purchase code.", "ol-scrapes")
        );
    }
}
