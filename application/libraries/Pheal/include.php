<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Nicolas Fortin
 * Date: 07/08/13
 * Time: 19:23
 *
 * Name : include.php
 * Description : *
 */



include_once('Access/CanCheck.php');
include_once('Access/NullCheck.php');
include_once('Access/StaticCheck.php');
include_once('Archive/CanArchive.php');
include_once('Archive/FileStorage.php');
include_once('Archive/NullStorage.php');
include_once('Cache/CanCache.php');
include_once('Cache/FileStorage.php');
include_once('Cache/ForcedFileStorage.php');
include_once('Cache/HashedNameFileStorage.php');
include_once('Cache/MemcacheStorage.php');
include_once('Cache/NullStorage.php');
include_once('Core/CanConvertToArray.php');
include_once('Core/Config.php');
include_once('Core/Container.php');
include_once('Core/Element.php');
include_once('Core/Result.php');
include_once('Core/RowSet.php');
include_once('Core/RowSetRow.php');
include_once('Exceptions/PhealException.php');
include_once('Exceptions/APIException.php');
include_once('Exceptions/AccessException.php');
include_once('Exceptions/ConnectionException.php');
include_once('Exceptions/HTTPException.php');
include_once('Fetcher/CanFetch.php');
include_once('Fetcher/Curl.php');
include_once('Fetcher/File.php');
include_once('Log/CanLog.php');
include_once('Log/FileStorage.php');
include_once('Log/NullStorage.php');
include_once('Pheal.php');

/* End of file include.php */