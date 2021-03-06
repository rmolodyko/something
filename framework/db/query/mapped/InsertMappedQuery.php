<?php

	namespace pyramid\db\query\mapped;
	use \pyramid\db\query\InsertQuery;
	use \pyramid\db\model\DomainModel;
	/**
	 * Класс предназначен для вставки данных в БД, отображенных данных
	 */
	class InsertMappedQuery extends InsertQuery{

		/**
		 * Инициализируем объект запроса, объектом модели
		 * @param InsertMappedQuery Возвращает объект для дальнейшего вызова методов над ним
		 */
		public function __construct(DomainModel $entity){
			//Убрать имя пространства и получить имя класса модели
			$this->tableName = strtolower(preg_replace('/.*\\\/i','',get_class($entity)));
			parent::values($this->getNativePropertiesModel($entity));
			return $this;
		}

		/**
		 * Запрещаем вызывать данный метод, так как он не может существовать в mapped типе
		 */
		public function values(Array $foo){
			throw new \Exception("Attempt to call not callable method");
		}

	}