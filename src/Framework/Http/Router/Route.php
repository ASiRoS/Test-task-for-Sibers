<?php

class Route
{
	private $path;
	private $handler;
	private $method;

	public function __construct(string $path, callable $handler)
	{
		$this->path = $path;
		$this->handler = $handler;
	}

	public function path()
	{
		return $this->path;
	}

	public function hanlder()
	{
		return $this->handler;
	}
}