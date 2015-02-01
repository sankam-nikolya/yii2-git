	public $cotainer_path = '/home/marcodasilva/Git/';
	
	public $repository;

	protected $repository_path;
	
	//The list of project in cotainer_path
	protected $repositories_list = array();
	 * Construct
	public function __construct($repository = null)	{
		if ($repository == null) {
			$this->setRepositorysList();
		} else {
			$this->setRepositoryPath($repository);
		}
	 * Search repositories on the specified path
	public function setRepositorysList() {
		if (is_dir($this->cotainer_path) && ($dh = opendir($this->cotainer_path))) {
        	while (($file = readdir($dh)) !== false) {
        		if (filetype($this->cotainer_path . $file) == "dir") {
        			if (file_exists($this->cotainer_path.$file."/HEAD")) {
        				$this->repositories_list[] = array_merge(
        					array(
        						'dir'=> $file, 
        						'description'=> @file_get_contents($this->cotainer_path.$file.'/description')
        					),
        					$this->getRevListHashDetail("--all",$file)
        				);
        			} elseif (file_exists($this->cotainer_path.$file."/.git/HEAD")) {
        				$this->repositories_list[] = array_merge(
        					array(
        						'dir'=> $file, 
        						'description'=> @file_get_contents($this->cotainer_path.$file.'/.git/description')
        					),
        					$this->getRevListHashDetail("--all",$file."/.git")
        				);
        			} else {
        				continue;
        	}
        	closedir($dh);
		} else {
			throw new NotFoundHttpException("La ruta base para repositorios GIT: $this->cotainer_path, no es un directorio o no posee repositorios.");
	 * return project list
	public function getRepositoriesList() {
    	return $this->repositories_list;
	public function setRepositoryPath($repository) {
		$realPath = realpath($this->cotainer_path.$repository); 
		if ((file_exists($realPath."/HEAD")) || (file_exists($realPath."/.git/HEAD"))) {
			if (file_exists($realPath."/.git/HEAD")) 
				$realPath .= "/.git/";
			$this->repository=substr($repository, -4) == ".git"?substr($repository, 0,-4):$repository;
			$this->repository_path = $realPath;
		} else {
			throw new NotFoundHttpException("La ruta especificada no existe o no es un repositorio git.");
	public function getRevList($start = 'HEAD', $skip = 0, $max_count = null) {
		if ($skip != 0) {
		if (!is_null($max_count)) {
		$result = $this->run_git($cmd);
		foreach ($result as &$hash) {
 		   $commitsList[] = $this->getRevListHashDetail($hash);
	public function getRevListHashDetail($hash = 'HEAD',$repository = null) {
		$output = $this->run_git("rev-list --date=raw --pretty=format:'tree %T %nparent %P %nauthor %an <%ae> %ad %ncommitter %cn <%ce> %cd %nsubject %s %n%B ' --max-count=1 $hash", $repository);
		foreach ($output as $line) {
			if (substr($line, 0, 7)=='commit ') {
			} elseif (substr($line, 0, 4) === 'tree') {
			} elseif (substr($line, 0, 6) === 'parent') {
			} elseif (preg_match($pattern, $line, $matches) > 0) {
			} elseif (substr($line, 0, 7) == 'subject') {
			} else {
		if (array_key_exists('author_stamp', $info)) {
		if (array_key_exists('committer_stamp', $info)) {
	public function getChangedPaths($hash) {
		if (empty($affected_files)) {
		}
		foreach ($affected_files as $file) {
			if (empty($output)) {
			}
			foreach ($output as $line) {
						'<a href="'.Yii::app()->createUrl("repositorio/".$parts[1],array("id"=>$this->repository_path, "hash"=>$hash, "hash_file"=>$parts[2])).'">Ver</a>',
	public function getTree($treeish,$hash) {
					'<a href="'.Yii::app()->createUrl("repositorio/".$parts[1],array("id"=>$this->repository_path, "hash"=>$hash, $parts[1]=="tree"?"tree":"hash_file"=>$parts[2])).'">Ver</a>',
	public function getShowRef($project = null, $tags = true, $heads = true, $remotes = true) {
		if (!$remotes) {
		$output = $this->run_git($cmd,$repository_path);
		foreach ($output as $line) {
	public function getNameRev($hash) {
		foreach ($output as $line) {
			if ($part[0]==$hash) {
				if (substr($name, 0, 4)=="tags") {
				} else {
			if (!empty($item['type'])) {
			}
	public function showDiffPath($hash,$hash_file) {
		} else {
		}
	public function showDiffCommit($hash_from,$hash_to) {
	public function formatDiff($text) {
		foreach ($text as $item) {
            if ('diff' === substr($item, 0, 4)) {
			} elseif (('new file'===substr($item,0,8)) || ('old mode'===substr($item,0,8)) || 
					('new mode'===substr($item,0,8)) || ('deleted file'===substr($item,0,12)) || 
					('index' === substr($item, 0, 5))) {
			} elseif ('Binary files'===substr($item,0,12)) {
			} elseif ('@@' === substr($item, 0, 2)) {
			} elseif ('---' === substr($item, 0, 3)) {
			} elseif ('+++' === substr($item, 0, 3)) {
			} elseif ('\ ' === substr($item, 0, 2)) {
			} elseif ('-' === substr($item, 0, 1)) {
            } elseif ('+' === substr($item, 0, 1)) {
            } else {
	public function showBlobFile($hash_file) {
	public function showNameHashFile($hash_file) {
		foreach (($this->run_git($command)) as $item) {
			if ($output['0']==$hash_file) {
			}
	 * Get blade file, opon para los view tree
	//public function getBlame($file) {
	public function getTags() {
		foreach($this->run_git("tag -l") as $item) {
	public function showtag($tag) {
		foreach($this->run_git("tag -v ".$tag) as $line) {
			if (substr($line, 0, 6) === 'object') {
			} elseif (substr($line, 0, 4) === 'type') {
			} elseif (substr($line, 0, 6) === 'tagger') {
			} elseif (substr($line, 0, 3) === 'tag') {
			} elseif (!empty($line)) {
			}
	public function verifyHash($hash) {
	public function getBranches() {
		foreach($this->run_git("branch") as $branchName) {
	public function showGraphLog() {
		$command = "log --graph --abbrev-commit --decorate --format=format:'<a href=?hash=%H><b>%h</b></a> - <font color=blue>%aD (%ar)</font> <span class=GITref>%d</span>%n''          <i>%s</i> - <b>%an</b>' --all";
		$output = $this->run_git($command);
	/*
	public function getTotalCommits() {
	 	$command = "rev-list --all $file | wc -l";
		return	$this->run_git($command);
	}

	public function getHooks() {
		if ($dh = opendir($this->cotainer_path.$this->project."/hooks/")) {
        	while (($file = readdir($dh)) !== false) {
        			$Hooks[] = array('name' => $file, 'contents'=> @file_get_contents($this->cotainer_path.$this->repository_path.'/hooks/'.$file));
    public function getConfigAll($global = false) {
    	if ($global) {
    	} else {
    	}
    public function getConfig($key, $global = false) {
	protected function run_git($command, $repository = null) {
		if ($repository == null) {
			$cmd = $this->gitPath." --git-dir=".escapeshellarg($this->repository_path)." $command";
		} else {
			$cmd = $this->gitPath." --git-dir=". escapeshellarg($this->cotainer_path . $repository) ." $command";
		}
	protected function run($command,$repository_path = null) {
		if ($repository_path == null) {
			$cmd = $this->gitPath." --git-dir=".escapeshellarg($this->repository_path)." $command";
		} else {
			$cmd = $this->gitPath." --git-dir=". escapeshellarg($this->cotainer_path . $repository_path) ." $command";
		}
		$resource = proc_open($cmd,$descriptor,$pipes,$this->repository_path);