<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function view($pageName, $forceCache = NULL)
    {
		include('./includes/markdown.php');
		
		$pageName = (isset($forceCache)) ? $pageName : $this->uri->uri_string();
		$pageName = (empty($pageName)) ? 'index' : str_replace("/", "", $pageName);
		
		if(file_exists('./ds/html/' . $pageName . '.html') && is_null($forceCache)) {
			return read_file('./ds/html/' . $pageName . '.html');
			exit;
		}
		
		if(file_exists(('./ds/pages/'. $pageName . '.php'))) {
			$pageData = file_get_contents("./ds/pages/" . $pageName . ".php");
		} else {
			if(file_exists('./ds/pages/pagenotfound.php')) {
				$pageData = file_get_contents("./ds/pages/pagenotfound.php");
			} else {
				echo "Bad web developer, bad! Page cannot be found, and no 'pagenotfound' page exists! Woops!";
				exit;
			}
		}
		
		$pageData = json_decode($pageData);
		
		$defaultSettings = json_decode(read_file('./ds/defaultsettings.json'));
		
		$pageMeta->title = (@isset($pageData->pageTitle)) ? $pageData->pageTitle : @$defaultSettings->defaultTitle;
		$pageMeta->keywords = (@isset($pageData->pageKeywords)) ? $pageData->pageKeywords : @$defaultSettings->defaultKeywords;
		$pageMeta->description = (@isset($pageData->pageDescription)) ? $pageData->pageDescription : @$defaultSettings->defaultDescription;
		
		$templateData = json_decode(file_get_contents("./ds/templates/$pageData->pageTemplate.php"));
		
		$bodyView->imageopen = '<img src="/images/';
		$bodyView->imageclose = '" />';
		$bodyView->imageURL = "/images/";
		$bodyView->mediaURL = "/media/";
		
		$pageData->pageBody = $this->parser->parse_string($pageData->pageBody, $bodyView, TRUE);
		
		$templateView->title = $pageMeta->title;
		$templateView->meta = '<meta content="'. $pageMeta->description . '" name="description">';
		$templateView->meta .= '<meta content="'. $pageMeta->keywords . '" name="keywords">';
		$templateView->body = Markdown($pageData->pageBody);
		$templateView->opencss = '<link rel="stylesheet" href="/usercss/';
		$templateView->closecss = '.css" type="text/css" charset="utf-8"/>';
		$templateView->imageopen = '<img src="/images/';
		$templateView->imageclose = '" />';
		$templateView->imageURL = site_url() . "/images/";
		$templateView->mediaURL = site_url() . "/media/";
		
		$html = $this->parser->parse_string($templateData->body, $templateView, TRUE);
		
		write_file('./ds/html/' . $pageName . '.html' , $html);
		
		return $html;
    }
}