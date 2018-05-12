class Person
  attr_accessor :name, :age
  def initialize(name, age)
    @name, @age = name, age
    @mayor = es_mayor?
  end
  def saluda
    puts "Hola #{@name} tu edad es #{@age}"
    puts @mayor? "Eres mayor de edad" : "Eres menor de edad"
  end
  def descompone
    @name.each_char { |chr| puts chr  }
  end
  def self.find
    "Has buscado algo"
  end
  private
   def es_mayor?
     return @age>=18? true : false
   end
end

persona = Person.new("César", 15)
persona.saluda
persona.descompone
puts persona.name
puts persona.age
puts Person.find
