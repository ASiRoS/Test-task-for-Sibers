<?php

class Route
{
	private $path;
	private $handler;

	public function __construct(string $path, callable $handler)
	{
		$this->path = $path;
		$this->handler = $handler;
	}

	public function path()
	{
		return $this->path;
	}

	public function handler()
	{
		return $this->handler;
	}
}