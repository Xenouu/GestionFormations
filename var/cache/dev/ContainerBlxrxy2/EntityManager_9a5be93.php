<?php

namespace ContainerBlxrxy2;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolderc698e = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer61678 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties6fc1c = [
        
    ];

    public function getConnection()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getConnection', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getMetadataFactory', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getExpressionBuilder', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'beginTransaction', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getCache', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getCache();
    }

    public function transactional($func)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'transactional', array('func' => $func), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'wrapInTransaction', array('func' => $func), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'commit', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->commit();
    }

    public function rollback()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'rollback', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getClassMetadata', array('className' => $className), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'createQuery', array('dql' => $dql), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'createNamedQuery', array('name' => $name), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'createQueryBuilder', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'flush', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'clear', array('entityName' => $entityName), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->clear($entityName);
    }

    public function close()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'close', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->close();
    }

    public function persist($entity)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'persist', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'remove', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'refresh', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'detach', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'merge', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getRepository', array('entityName' => $entityName), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'contains', array('entity' => $entity), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getEventManager', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getConfiguration', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'isOpen', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getUnitOfWork', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getProxyFactory', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'initializeObject', array('obj' => $obj), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'getFilters', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'isFiltersStateClean', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'hasFilters', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return $this->valueHolderc698e->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer61678 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolderc698e) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderc698e = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolderc698e->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, '__get', ['name' => $name], $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        if (isset(self::$publicProperties6fc1c[$name])) {
            return $this->valueHolderc698e->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc698e;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderc698e;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc698e;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolderc698e;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, '__isset', array('name' => $name), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc698e;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolderc698e;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, '__unset', array('name' => $name), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderc698e;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolderc698e;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, '__clone', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        $this->valueHolderc698e = clone $this->valueHolderc698e;
    }

    public function __sleep()
    {
        $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, '__sleep', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;

        return array('valueHolderc698e');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer61678 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer61678;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer61678 && ($this->initializer61678->__invoke($valueHolderc698e, $this, 'initializeProxy', array(), $this->initializer61678) || 1) && $this->valueHolderc698e = $valueHolderc698e;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderc698e;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderc698e;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
