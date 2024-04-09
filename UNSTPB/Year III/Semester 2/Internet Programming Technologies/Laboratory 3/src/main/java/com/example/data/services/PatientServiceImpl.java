package com.example.data.services;

import jakarta.persistence.EntityManager;
import jakarta.persistence.TypedQuery;
import jakarta.transaction.Transactional;
import com.example.data.domain.Patient;
import org.springframework.context.annotation.Primary;
import org.springframework.stereotype.Service;

import java.util.List;
import jakarta.persistence.PersistenceContext;

@Primary
@Service
public class PatientServiceImpl implements PatientService {
    @PersistenceContext
    private EntityManager em;

    public List<Patient> findAll(){
        TypedQuery<Patient> query = em.createQuery("select f from Patient f", Patient.class);
        return query.getResultList();
    }
    @Override
    @Transactional
    public Patient save(Patient p) {
        em.persist(p);
        em.flush();
        return p;
    }

    public List<Patient> findPatient(long id, String name){
        return null;
    }

}