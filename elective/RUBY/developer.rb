class Developer
    attr_accessor :knowledge, :time, :energy
    @@count = 0
    def initialize
        @knowledge = 80
        @time = 8
        @energy = 100
    end
    def code_review object
        if(object.class.ancestors.any?{|i| i==="Developer"})
            @knowledge += 1
            true
        else
            false
        end
        self
    end
    def showStats
        puts "Knowledge: #{@knowledge}"
        puts "Time: #{@time}"
        puts "Energy: #{@energy}"
        self
    end
    protected
    def count_Juniors
        @@count +=1
    end
end